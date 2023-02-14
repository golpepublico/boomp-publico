<?php

namespace App\Http\Controllers;

use App\Enums\PaymentType;
use App\Enums\StatusOrderType;
use App\Enums\StatusWithdrawType;
use App\Enums\TransactionType;
use App\Models\Bank;
use App\Models\BankAccount;
use App\Models\Order;
use App\Models\Wallet;
use App\Models\Withdraw;
use App\Models\WalletTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\WithdrawsExport;
use App\Exports\WalletTransactionsExport;
use App\Repositories\BankAccountRepository;
use App\Repositories\WalletRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class WalletController extends Controller
{

    protected $walletRepository;
    protected $bankAccountRepository;

    public function __construct(WalletRepository $walletRepository, BankAccountRepository $bankAccountRepository)
    {
        $this->walletRepository = $walletRepository;
        $this->bankAccountRepository = $bankAccountRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $walletTransactions = [];
        $ordersPending = [];
        $dateInitial = request()->get('dateInitial') ?? Carbon::now()->startOfMonth()->format('Y-m-d');
        $dateFinal = request()->get('dateFinal') ?? Carbon::now()->endOfDay()->format('Y-m-d');
        $operationSearch = request()->get('operationSearch') ?? null;

        $perPage = request('perPage', 10);
        $transactionTypes = TransactionType::getInstances();

        $wallet = Wallet::where('user_id', Auth::user()->id)
            ->first();
        if (isset($wallet)) {
            $walletTransactions = WalletTransaction::where(['wallet_id' => $wallet->id, 'blocked' => false])
                ->when($operationSearch, function ($query) use ($operationSearch) {
                    return $query->where('transaction_type', $operationSearch);
                })
                ->where(function ($query) use ($dateInitial, $dateFinal) {
                    if ($dateInitial && $dateFinal) {
                        $query->whereDate('wallet_transactions.created_at', '>=', $dateInitial)
                            ->whereDate('wallet_transactions.created_at', '<=', $dateFinal);
                    }
                })
                ->orderBy('created_at', 'asc')
                ->paginate($perPage)
                ->withPath('?dateInitial=' . $dateInitial . '&dateFinal=' . $dateFinal . '&operationSearch=' . $operationSearch . '&perPage=' . $perPage);

            // $ordersPending = Order::join('stores', 'stores.id', '=', 'orders.store_id')
            //     ->where('stores.user_id', Auth::user()->id)
            //     ->where('orders.status', StatusOrderType::PENDENTE)
            //     ->selectRaw('sum(orders.value) as totalPending')
            //     ->first();

            $ordersPending = WalletTransaction::where([
                'wallet_id' => $wallet->id,
                'blocked' => true,
                'transaction_type' => 1
            ])
            ->selectRaw('sum(value) as totalPending')
            ->first();

        }

        return view('pages.wallet.index', compact('wallet', 'ordersPending', 'transactionTypes', 'walletTransactions', 'dateInitial', 'dateFinal', 'operationSearch'));
    }

    public function payment()
    {
        $dateInitial = request()->get('dateInitial') ?? Carbon::now()->startOfMonth()->format('Y-m-d');
        $dateFinal = request()->get('dateFinal') ?? Carbon::now()->endOfDay()->format('Y-m-d');
        $statusSearch = request()->get('statusSearch') ?? null;

        $perPage = request('perPage', 10);
        $statusWithdraws = StatusWithdrawType::getInstances();

        $withdraws = Withdraw::join('wallets', 'wallets.id', 'withdraws.wallet_id')
            ->join('bank_accounts', 'bank_accounts.id', 'withdraws.bank_account_id')
            ->join('banks', 'banks.id', 'bank_accounts.bank_id')
            ->where('wallets.user_id', Auth::user()->id)
            ->when($statusSearch, function ($query) use ($statusSearch) {
                return $query->where('withdraws.status', $statusSearch);
            })
            ->where(function ($query) use ($dateInitial, $dateFinal) {
                if ($dateInitial && $dateFinal) {
                    $query->whereDate('withdraws.created_at', '>=', $dateInitial)
                        ->whereDate('withdraws.created_at', '<=', $dateFinal);
                }
            })
            ->select('withdraws.*', 'bank_accounts.account_holder', 'bank_accounts.agency', 'bank_accounts.account', 'banks.name')
            ->groupBy('withdraws.id')
            ->orderBy('withdraws.created_at', 'desc')
            ->paginate($perPage)
            ->withPath('?dateInitial=' . $dateInitial . '&dateFinal=' . $dateFinal . '&statusSearch=' . $statusSearch . '&perPage=' . $perPage);

        return view('pages.wallet.payment', compact('withdraws', 'statusWithdraws', 'dateInitial', 'dateFinal', 'statusSearch'));
    }

    public function withdraw()
    {
        $bankAccounts = BankAccount::where('user_id', Auth::user()->id)->get();
        $banks = Bank::all();
        $wallet = Wallet::where('user_id', Auth::user()->id)->first();
        return view('pages.wallet.withdraw', compact('bankAccounts', 'banks', 'wallet'));
    }

    public function prewithdraw(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'step' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }

        if($request->step === 2){
            $validator = Validator::make($request->params, [
                'bank_account_id' => 'integer|required'
            ]);
            if ($validator->fails()) {
                return response()->json(['status' => false, 'errors' => $validator->errors()]);
            }
            $bankId = $request->params['bank_account_id'];

            $bankChose = $this->bankAccountRepository->getBankAccountById($bankId);

            if(!isset($bankChose)){
                return response()->json(['status' => false, 'errors' => $validator->errors()->add('bank', 'not found')]);
            }

            session()->put('prewithdraw.bank_account_id', $bankId);
            session()->put('prewithdraw.account_holder', $bankChose->account_holder);
            session()->put('prewithdraw.agency', $bankChose->agency);
            session()->put('prewithdraw.account', $bankChose->account);
            session()->put('prewithdraw.cpfCnpj', $bankChose->cpfCnpj);
        }

        if($request->step === 3){
            $validator = Validator::make($request->params, [
                'value_withdraw' => 'required|string'
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => false, 'errors' => $validator->errors()]);
            }
            session()->put('prewithdraw.value_withdraw', $request->params['value_withdraw']);
        }

        return response()->json(['status' => true, 'step' => $request->step, 'params' => session()->get('prewithdraw')]);
    }

    public function createBankAccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'integer|exists:users,id',
            'bank_id' => 'integer|exists:banks,id',
            'account_holder' => 'required|string|min:2|max:100',
            'agency' => 'required|string|min:3|max:10',
            'account' => 'required|string|min:3|max:20',
            'cpfCnpj' => 'required|cpf_ou_cnpj|max:14',
        ]);

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['bank_id'] = $request->bank_id;

        BankAccount::create($data);

        return Redirect::back()
            ->withSuccess('Conta bancária cadastrada com sucesso!');
    }

    public function createTransfer(Request $request)
    {
        $wallet = Wallet::where('user_id', Auth::user()->id)->first();
        $value_withdraw = str_replace(',', '.', $request['value_withdraw']);
        $validator = Validator::make($request->all(), [
            'bank_account_id' => 'integer|exists:bank_accounts,id',
            'value_withdraw' => 'required|min:0|max:' . $wallet->balance,
        ]);

        if ($value_withdraw > $wallet->balance) {
            return Redirect::back()
                ->withErrors('Valor de saque não pode ser maior que o saldo disponível')
                ->withInput();
        }

        if ($value_withdraw < 0.01) {
            return Redirect::back()
                ->withErrors('Valor de saque não pode ser menor que R$ 0,01')
                ->withInput();
        }

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        // Dúvida: Como esse valor será setado? Pelo cliente ou pelo webhook?
        // Quando PAGO temos que DEBITAR do saldo do usuário e gerar historico na wallet_transactions
        // $wallet->balance = $wallet->balance - $request->value;


        $data = $request->all();
        $code = Str::random(6);

        $data['wallet_id'] = $wallet->user_id;
        $data['status'] = StatusWithdrawType::PENDENTE();
        $data['payment_type'] = PaymentType::AUTOMATICO();
        $data['value_withdraw'] = $value_withdraw;
        $data['code'] = $code;
        $data['payment_date'] = null;

        Withdraw::create($data);

        WalletTransaction::create([
            'wallet_id' => $wallet->id,
            'title' => 'Solicitação de transferência',
            'description' => 'Aguardando tranferência. Código: #' . $code,
            'transaction_type' => TransactionType::DEBITO,
            'code' => $code,
            'value' => $value_withdraw,
            'balance' => $wallet->balance - $value_withdraw,
            'blocked' => false,
        ]);

        $wallet->balance = $wallet->balance - $value_withdraw;
        $wallet->save();

        // Se a transferencia acontere mudar o status em withdraw para PAGO e gerar historico na wallet_transactions com a confirmação da transação
        // se não acontecer mudar o status para CANCELADO e gerar historico na wallet_transactions com o cancelamento da transação e devolver o valor para o saldo do usuário

        return Redirect::back()
            ->withSuccess('Solicitação de saque realizada com sucesso!');
    }

    public function exportWithdraw()
    {
        return Excel::download(new WithdrawsExport, 'Relatório Pagamentos - ' . Carbon::now()->isoFormat('DD-MM-YY HH:mm:ss') . '.xlsx');
    }

    public function exportWalletTransaction()
    {
        return Excel::download(new WalletTransactionsExport, 'Extrato Completo - ' . Carbon::now()->isoFormat('DD-MM-YY HH:mm:ss') . '.xlsx');
    }
}
