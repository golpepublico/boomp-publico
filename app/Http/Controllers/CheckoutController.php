<?php

namespace App\Http\Controllers;

use App\Enums\BillingType;
use App\Enums\StatusOrderType;
use App\Models\Customers;
use App\Models\Order;
use App\Helpers\Download;
use App\Helpers\FormatString;
use App\Events\PostbackEvent;
use App\Repositories\CouponRepository;
use App\Repositories\ProductRepository;
use App\Repositories\CustomersRepository;
use App\Repositories\OrderRepository;
use App\Repositories\PixelRepository;
use Illuminate\Http\Request;
use CodePhix\Asaas\Asaas;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Nette\Utils\Json;
use stdClass;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentMailer;
use Exception;
use Illuminate\Http\Response;
use Moip\Moip;
use Moip\Auth\BasicAuth;
use App\Http\Requests\PaymentRequest;
use Illuminate\Support\Facades\Http;

const MOIP_CANCELADO = 'CANCELLED';
const MOIP_ANALISE = 'IN_ANALYSIS';

class CheckoutController extends Controller
{
    protected $productRepository;
    protected $customersRepository;
    protected $orderRepository;
    protected $pixelRepository;
    protected $asaasMdl;
    protected $moip;

    public function __construct(
        ProductRepository $productRepository,
        CustomersRepository $customersRepository,
        OrderRepository $orderRepository,
        CouponRepository $couponRepository,
        PixelRepository $pixelRepository
    ) {
        $this->productRepository = $productRepository;
        $this->customersRepository = $customersRepository;
        $this->orderRepository = $orderRepository;
        $this->couponRepository = $couponRepository;
        $this->pixelRepository = $pixelRepository;
        $this->asaasMdl = new Asaas(env('ASAAS_SECRET_KEY'), env('ASSAS_AMBIENTE'));

        if(env('MOIP_HOMOLOGACAO')){
            $this->moip = new Moip(new BasicAuth(env('MOIP_TOKEN'), env('MOIP_KEY')), Moip::ENDPOINT_SANDBOX);
        }else{
            $this->moip = new Moip(new BasicAuth(env('MOIP_TOKEN'), env('MOIP_KEY')), Moip::ENDPOINT_PRODUCTION);
        }
    }

    public function produto($store, $produto)
    {
        $product = $this->productRepository->getByProductAndStoreSlug($produto, $store);
        if(!isset($product)){
            Log::info("produto nao encontrado");
            return \response()->json(["Produto não encontrado"], Response::HTTP_OK);
        }

        return view('pages.checkout-new.index', compact('product'));
    }

    public function produtouuid($store, $produto, $uuid)
    {
        $order = $this->orderRepository->getCustomerByUuidOrder($uuid);

        if (!$order) {
            return redirect()
                ->route('checkout.produto', ['store' => $store, 'produto' => $produto]);
        }

        $product = $order->product;
        $customer = $order->customer;

        return view('pages.checkout-new.index', compact('product', 'customer'));
    }

    public function payment(PaymentRequest $request)
    {
        $dados = $request->all();

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '. env('KEY_WE_PAYMENTS'),
            'Content-Type'  => 'application/json'
        ]);

        if ($dados['payment_option']['boleto']) {
            $response->post('https://api.sandbox.wepayout.com.br/v1/payout/payments', [
                'amount' => 1000,
                'custom_code' => 'YOURAPPCODE',
                'notification_url' => 'https://test.requestcatcher.com/',
                'beneficiary' => (object) [
                  'name' => 'The Name',
                  'bank_code' => '147',
                  'bank_branch' => '0000',
                  'bank_branch_digit' => '1',
                  'account' => '1030000',
                  'account_digit' => '1',
                  'account_type' => 'CHECKING',
                  'document' => '12533009091',
                  'document_type' => 'cpf'
                ],
                'legal_entity_name' => "Your client\'s name",
                'website' => "Your client\'s website"
            ]);

        }

        if ($dados['payment_option']['credit_card']) {
            
        }

        if ($dados['payment_option']['pix']) {
            
        }

        /* Em caso de falha lança exception */
        $response->throw();
    }

    public function payment_old(Request $request)
    {
        exit;
        return true;

        $validator = Validator::make($request->all(), [
                'name'          => 'required|string|max:100',
                'payment_option' => 'required|string|max:100',
                'cpfCnpj'       => 'required|cpf_ou_cnpj|max:20',
                'email'         => 'required|string|email:rfc,dns|max:100',
                'mobilePhone'   => 'required|celular_com_ddd|max:20',
                'postalCode'    => 'required|formato_cep|max:10',
                'state'         => 'required|string|uf|max:2',
                'city'          => 'required|string|max:100',
                'address'       => 'required|string|max:100',
                'addressNumber' => 'required|string|max:10',
                'province'      => 'required|string|max:100',
                'complement'    => 'max:50',
            ],
            [
                'payment_option.required' => 'Selecione a forma de pagamento'
            ]);

        if ($validator->fails()) {
            return redirect(url()->previous())
                ->withErrors($validator)
                ->withInput();
        }

        $customerData = $request->all();
        $customerData['cpfCnpj'] = FormatString::onlyNumbers($request->cpfCnpj);
        $customerData['mobilePhone'] = FormatString::onlyNumbers($request->mobilePhone);
        $customerData['postalCode'] = FormatString::onlyNumbers($request->postalCode);

        $customer = $this->customersRepository->getByDoc($customerData['cpfCnpj']);

        $dataCustomer = [
            'name' => $customerData['name'],
            'cpfCnpj' => $customerData['cpfCnpj'],
            'email' => $customerData['email'],
            'mobilePhone' => $customerData['mobilePhone'],
            "notificationDisabled" => true,
        ];

        $ddd = substr($customerData['mobilePhone'], 0, 2);
        $phone = substr($customerData['mobilePhone'], 2, 9);
        $TaxDocument = (strlen($customerData['cpfCnpj']) > 11) ? 'CNPJ' : 'CPF';
        $customerMoip = $this->moip->customers()->setOwnId(uniqid())
            ->setFullname($customerData['name'])
            ->setEmail($customerData['email'])
            ->setTaxDocument($customerData['cpfCnpj'], $TaxDocument)
            ->setPhone($ddd, $phone)
            ->addAddress(
                'BILLING',
                $customerData['address'],
                $customerData['addressNumber'],
                $customerData['province'],
                $customerData['city'],
                $customerData['state'],
                $customerData['postalCode'],
                $customerData['complement']
            );

        if (empty($customer)) {
            if ($request->payment_option == 'credit_card' && env('MOIP_ACTIVE') == true) {
                $cliente = $customerMoip->create();
            } else {
                $cliente = $this->asaasMdl->Cliente()->create($customerData);
            }

            $cliente = json_decode(json_encode($cliente), true);
            $dataCustomer['customer_id_asaas'] = $cliente['id'];
            unset($dataCustomer['notificationDisabled']);
            Customers::create($dataCustomer);
        } else {
            if ($request->payment_option == 'credit_card' && env('MOIP_ACTIVE') == true) {
                if (empty($customer->customer_id_moip)) {
                    $cliente = $customerMoip->create();
                }
                // Não tem else pois o MOIP só faz o update do customer quando cria um novo pedido.
                if (!isset($cliente)) {
                    $cliente = $this->moip->customers()->get($customer->customer_id_moip);
                }

                $cliente = json_decode(json_encode($cliente), true);
                unset($dataCustomer['notificationDisabled']);
                Customers::where('cpfCnpj', $customerData['cpfCnpj'])
                    ->update(['customer_id_moip' => $cliente['id']] + $dataCustomer);
            } else {
                $customerData['notificationDisabled'] = true;

                if (empty($customer->customer_id_asaas)) {
                    $cliente = $this->asaasMdl->Cliente()->create($customerData);
                } else {
                    $cliente = $this->asaasMdl->Cliente()->update($customer->customer_id_asaas, $customerData);
                }

                unset($dataCustomer['notificationDisabled']);
                Customers::where('cpfCnpj', $customerData['cpfCnpj'])
                    ->update(['customer_id_asaas' => $cliente->id] + $dataCustomer);
            }
        }
        // Log::info(Json::encode(['Customer' => $cliente, 'customerData' => $customerData]));

        $product = $this->productRepository->findById($request->product_id);
        $coupons = $this->couponRepository->findBy(['coupon' => $request->coupon, 'store_id' => $request->store_id]);
        $discount = 0;
        foreach ($coupons as $coupon) {
            $discount = $coupon->discount;
        }

        if (env('MOIP_ACTIVE') == true) {
            // create order for moip active
            $order = $this->moip->orders()->setOwnId(uniqid())
                ->addItem($product->name, 1, $product->description, (int) ($product->price) * 100)
                ->setShippingAmount(0)
                ->setAddition(0)
                ->setDiscount(0)
                ->setCustomer($customerMoip)
                ->create();
        }

        $paymentOption = $request->payment_option;
        $installment = null;
        $installmentCount = null;
        $installmentValue = 0;
        $payment_id_asaas = null;
        $payment_id_moip = null;
        $statusOrder = StatusOrderType::PENDENTE();

        if ($paymentOption == 'credit_card' && env('MOIP_ACTIVE') == true) {
            // payment credit card moip active
            try {
                //tentativa de aprovar pedido
                $statusOrder = StatusOrderType::PAGO();
                $holder = $this->moip->holders()
                    ->setFullname($customerData['name'])
                    ->setTaxDocument($customerData['cpfCnpj'])
                    ->setPhone($ddd, $phone)
                    ->setAddress(
                        'BILLING',
                        $customerData['address'],
                        $customerData['addressNumber'],
                        $customerData['province'],
                        $customerData['city'],
                        $customerData['state'],
                        $customerData['postalCode'],
                        $customerData['complement']
                    );

                $hashCartao = $request->get('encrypted_value');
                $paymentMoip = $order->payments()
                    ->setCreditCardHash($hashCartao, $holder)
                    ->setInstallmentCount($request->numberInstallments)
                    ->setStatementDescriptor('BOOMP')
                    ->execute();

                $paymentMoip = json_decode(json_encode($paymentMoip), true);
                Log::info(json_encode(['orderMoip' => $paymentMoip]));
                if(isset($paymentMoip['status']) && $paymentMoip['status'] === MOIP_CANCELADO){

                    Log::info("Compra nao aprovada cartao de credito" . Json::encode($request->all()));
                    $orderPayment = $this->orderRepository->getCartByProductAndStore($request->product_id, $request->store_id, $customer->id);
                    if (isset($orderPayment)) {
                        $orderPayment->status = StatusOrderType::CANCELADO();
                        $orderPayment->payment_id_moip = $paymentMoip['id'];
                        $orderPayment->save();
                        Log::info("Compra cancelada $orderPayment->id");
                    }

                    $validator->errors()->add('cred', 'Transação não autorizada. Verifique os dados do cartão de crédito e tente novamente.');
                    return redirect(url()->previous())
                        ->withErrors($validator)
                        ->withInput();

                }

                if(isset($paymentMoip['status']) && $paymentMoip['status'] === MOIP_ANALISE){
                    $statusOrder = StatusOrderType::ANALISE();
                }

                $installmentValue = ($paymentMoip['amount']['total'] / $paymentMoip['installmentCount']) / 100;
                $installmentCount = $paymentMoip['installmentCount'];
                $payment_id_moip  = $paymentMoip['id'];
                $dataPayment = [
                    'paymentId' => $paymentMoip['id'],
                    'invoiceUrl' => $paymentMoip['_links']['self']['href'],
                    'billingType' => BillingType::fromKey($paymentMoip['fundingInstrument']['method']),
                    'value' => $paymentMoip['amount']['total'] / 100,
                    'netValue' => 0,
                ];
            } catch (Exception $e) {
                Log::info("Compra nao aprovada cartao de credito" . Json::encode($request->all()));
                $orderPayment = $this->orderRepository->getCartByProductAndStore($request->product_id, $request->store_id, $customer->id);
                if (isset($orderPayment)) {
                    $orderPayment->status = StatusOrderType::CANCELADO();
                    $orderPayment->save();
                    Log::info("Compra cancelada $orderPayment->id");
                }

                $validator->errors()->add('cred', 'Transação não autorizada. Verifique os dados do cartão de crédito e tente novamente.');
                return redirect(url()->previous())
                    ->withErrors($validator)
                    ->withInput();
            }
        } else if ($paymentOption == 'credit_card' && env('MOIP_ACTIVE') == false) {
            // payment credit card asaas active
            $statusOrder = StatusOrderType::PAGO();
            if ($request->numberInstallments != 1) {
                $installmentValue = ($product->price / $request->numberInstallments);
                $purchaseInstallment = [
                    'maxInstallmentCount' => 12, // Quantidade máxima de parcelas que seu cliente poderá parcelar o valor
                    'installmentCount' => $request->numberInstallments,
                    'installmentValue' => number_format($installmentValue, 2, '.', ''),
                ];
            }

            $dadosCobranca = [
                'customer'      => $cliente->id,
                'billingType'   => $paymentOption,
                'dueDate'       => Carbon::now()->isoFormat('YYYY-MM-DD'),
                'value'         => number_format($product->price, 2, '.', ''),
                'description'   => $product->description,
                'creditCard' => [
                    'holderName' => $request->holderName,
                    'number' => $request->number,
                    'expiryMonth' => Carbon::createFromFormat('m/Y', $request->validate)->format('m'),
                    'expiryYear' => Carbon::createFromFormat('m/Y', $request->validate)->format('Y'),
                    'ccv' => $request->cvv,
                ],
                'creditCardHolderInfo' => [
                    'name' => $request->name,
                    'email' => $request->email,
                    'cpfCnpj' => $request->cpfCnpj,
                    'postalCode' => $request->postalCode,
                    'addressNumber' => $request->addressNumber,
                    'complement' => $request->complement,
                    'mobilePhone' => $request->mobilePhone,
                ],
            ];

            if (isset($purchaseInstallment)) {
                $dadosCobranca = Arr::collapse([$dadosCobranca, $purchaseInstallment]);
            }

            $cobranca = $this->asaasMdl->Cobranca()->create($dadosCobranca);
            if (isset($cobranca->errors)) {
                Log::error(Json::encode($cobranca));
                $validator->errors()->add('cred', 'Transação não autorizada. Verifique os dados do cartão de crédito e tente novamente.');
                return redirect(url()->previous())
                    ->withErrors($validator)
                    ->withInput();
            }

            if (isset($purchaseInstallment)) {
                $installment = $cobranca->installment;
                $parcelamento = $this->asaasMdl->Parcelamento()->getById($installment);
                $installmentValue = $parcelamento->paymentValue;
                $installmentCount = $parcelamento->installmentCount;
                $cobranca->value = $parcelamento->value;
                $cobranca->netValue = $parcelamento->netValue;
            }
        } else {
            // payment pix or boleto only asaas
            $dadosCobranca = [
                'customer'      => $cliente->id,
                'billingType'   => $paymentOption,
                'dueDate'       => Carbon::now()->addDay(3),
                'value'         => $product->price,
                'description'   => $product->description,
                'discount'      => ['value' => $discount, 'dueDateLimitDays' => 10], // até 10 dias úteis que o seu cliente poderá pagar o boleto após gerado.
            ];

            $cobranca = $this->asaasMdl->Cobranca()->create($dadosCobranca);

            $paymentMailerData = new stdClass();
            $paymentMailerData->pedido = $cobranca->id;
            $paymentMailerData->produto = $product;
            $paymentMailerData->to = $request->email;
            $paymentMailerData->customer = $customer;
            $paymentMailerData->order = $cobranca;

            if ($paymentOption == 'pix') {
                $pixData = $this->asaasMdl->Pix()->create($cobranca->id);
                $paymentMailerData->pathFile = Download::downloadImagePixEncodeImg($pixData->encodedImage);
                $paymentMailerData->nameFIle = 'qrcodePix';
                $paymentMailerData->payload =  $pixData->payload;
                $paymentMailerData->encodedImage =  $pixData->encodedImage;
                $paymentMailerData->mime = 'application/jpg';
            }

            if ($paymentOption == 'boleto') {
                $paymentMailerData->pathFile  = Download::downloadPDFByLink($cobranca->bankSlipUrl);
                $paymentMailerData->nameFIle = 'boleto-boomp';
                $paymentMailerData->mime = 'application/pdf';
                $paymentMailerData->boleto = true;
            }

            Mail::send(new PaymentMailer($paymentMailerData));
        }

        if ($paymentOption != 'credit_card' || env('MOIP_ACTIVE') == false) {
            $payment_id_asaas  = $cobranca->id;
            $dataPayment = [
                'paymentId' => $cobranca->id,
                'invoiceUrl' => $cobranca->invoiceUrl,
                'billingType' => BillingType::fromKey($cobranca->billingType),
                'value' => $cobranca->value,
                'netValue' => $cobranca->netValue,
            ];
        }

        $dataOrder = [
            'store_id'          => $request->store_id,
            'customer_id'       => $customer->id,
            'product_id'        => $request->product_id,
            'status'            => $statusOrder,
            'payment_id_asaas'  => $payment_id_asaas,
            'payment_id_moip'   => $payment_id_moip,
            'installment'       => $installment,
            'billingType'       => $dataPayment['billingType'],
            'invoiceUrl'        => $dataPayment['invoiceUrl'],
            'value'             => $dataPayment['value'],
            'netValue'          => $dataPayment['netValue'],
            'installmentValue'  => $installmentValue,
            'installmentCount'  => $installmentCount,
            'path_file'         => !empty($paymentMailerData->pathFile) ? $paymentMailerData->pathFile : null,
            'uuid'              =>  Str::uuid()->toString()
            // 'discount'          => $cobranca->discount->value,
        ];

        if ($statusOrder == StatusOrderType::PAGO()) {
            $dataOrder['payment_date'] = Carbon::now();
        }

        $order = $this->orderRepository->getCartByProductAndStore($request->product_id, $request->store_id, $customer->id);
        if (isset($order)) {
            $order->update($dataOrder);
        } else {
            $order = Order::create($dataOrder);
        }

        $address = [
            'endereco' => $request->address,
            'cidade' => $request->city,
            'bairro' => $request->province,
            'cep' => $request->postalCode,
            'numero' => $request->addressNumber,
            'complemento' => !isset($request->complement) ? '-' : $request->complement,
            'uf' => $request->state,
        ];

        $endereco = $order->enderecos()->first();
        if ($endereco) {
            $endereco->update($address);
        } else {
            $order->enderecos()->create($address);
        }

        $this->dispatchPostback($order);

        return Redirect::to('checkout/status/' . $dataPayment['paymentId']);
    }

    public function precart(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name'     => 'required|string|max:100',
                'email'    => 'required|string|max:100',
                'mobilePhone' => 'required|celular_com_ddd|max:20',
                'cpfCnpj'  => 'required|cpf_ou_cnpj|max:20',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->getMessageBag()]);
        }

        $dataCustomer = $request->all();
        $dataCustomer['cpfCnpj'] = FormatString::onlyNumbers($request->cpfCnpj);
        $dataCustomer['mobilePhone'] = FormatString::onlyNumbers($request->mobilePhone);
        $dataCustomer['notificationDisabled'] = true;

        $customer = $this->customersRepository->getByDoc($dataCustomer['cpfCnpj']);

        // Se existir o customer, busca o pedido e retorna
        if (isset($customer)) {
            $order = $this->orderRepository->getCartByProductAndStore($request->product_id, $request->store_id, $customer->id);
            if (isset($order)) {
                return response()->json(['success' => true]);
            }
        }

        if (!$customer) {
            $clienteAsaas = $this->asaasMdl->Cliente()->create($dataCustomer);

            $dataCustomer['customer_id_asaas'] = $clienteAsaas->id;
            $customer = Customers::create($dataCustomer);
        }

        $product = $this->productRepository->findById($request->product_id);

        $order = Order::create([
            'store_id'    => $request->store_id,
            'customer_id' => $customer->id,
            'product_id'  => $product->id,
            'value'       => $product->price,
            'status'      => StatusOrderType::PRECART(),
            'uuid' =>  Str::uuid()->toString(),
        ]);

        $this->dispatchPostback($order);

        return response()->json(['success' => true]);
    }

    public function status($idpayment)
    {
        $order = $this->orderRepository->getOrderByIdPayment($idpayment);
        if (!isset($order->customer)) {
            Log::info("PAGAMENTO NAO ENCONTRADO - $idpayment");
            return view('checkout.status-invalid', ['pixels' => []]);
        }
        $product = $this->productRepository->findById($order->product_id);
        $pixels = $this->pixelRepository->findBy(['store_id' => $order->store_id]);
        if (!empty($order->payment_id_moip)) {
            $paymentData = $this->moip->payments()->get($idpayment);
            $paymentData->id = $order->payment_id_moip;
            $paymentData->description = $order->product->name;
            $paymentData->value = $order->value;
            $paymentData->installmentCount = $order->installmentCount;
            $paymentData->installmentValue = $order->installmentValue;
            $endereco = $order->enderecos()->first();

            if($order->status == StatusOrderType::CANCELADO()){
                return view('checkout.payment-not-authorized', compact(['paymentData', 'order', 'product', 'endereco', 'pixels']));
            }
            return view('checkout.status-cartao-moip', compact(['paymentData', 'order', 'product', 'endereco', 'pixels']));
        } else {
            $paymentData = $this->asaasMdl->Cobranca()->getById($idpayment);
            $customer = $this->asaasMdl->Cliente()->getById($paymentData->customer);
            $cidade = $this->asaasMdl->Cidade()->getById($customer->city);
        }

        if (!isset($paymentData->customer)) {
            Log::info("PAGAMENTO NAO ENCONTRADO - " . Json::encode($paymentData));
            return view('checkout.status-invalid', ['pixels' => []]);
        }

        if ($order->billingType == BillingType::PIX()) {
            $pixData = $this->asaasMdl->Pix()->create($idpayment);

            if (isset($pixData->errors->code)) {
                return view('checkout.status-invalid', ['pixels' => []]);
            }
            if(!isset($pixData->encodedImage)){
                Log::info(Json::encode($pixData));
                return view('checkout.status-invalid', ['pixels' => []]);
            }
            return view('checkout.status-pix', [
                'pixData' => $pixData,
                'order' => $order,
                'product' => $product,
                'pixels' => $pixels
            ]);
        }

        if ($order->billingType == BillingType::BOLETO()) {
            $boletoCode = $this->asaasMdl->Cobranca()->getInfoBoleto($idpayment);
            return view('checkout.status-boleto', compact(['boletoCode', 'paymentData', 'order', 'product', 'pixels']));
        }

        if (!empty($order->installment) && env('MOIP_ACTIVE') == false) {
            $paymentData = $this->asaasMdl->Parcelamento()->getById($order->installment);
        }

        return view('checkout.status-cartao', compact(['paymentData', 'order', 'product', 'customer', 'cidade', 'pixels']));
    }

    private function dispatchPostback($order)
    {
        if (!isset($order->product->postback)) {
            return false;
        }

        $eventsValue = array_keys($order->product->postback->events);
        if (in_array($order->status->value, $eventsValue)) {
            PostbackEvent::dispatch($order);
        }
    }
}
