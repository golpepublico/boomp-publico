<?php

namespace App\Exports;

use App\Enums\TransactionType;
use App\Models\WalletTransaction;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class WalletTransactionsExport implements FromCollection, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $transactions = WalletTransaction::join('wallets', 'wallets.id', 'wallet_transactions.wallet_id')
        ->where('wallets.user_id', Auth::user()->id)
        ->select('wallet_transactions.*', 'wallets.balance')
        ->orderBy('wallet_transactions.created_at', 'desc')
        ->get();

        $transactions = $transactions->map(function ($walletTransaction) {
            return [
                'created_at' => $walletTransaction->created_at->format('d/m/Y H:i:s'),
                'description' => $walletTransaction->description,
                'transaction_type' => $walletTransaction->transaction_type == TransactionType::CREDITO ? 'CREDITO' : 'DEBITO',
                'value' => 'R$ ' . number_format($walletTransaction->value, 2, ',', '.'),
                'balance' => 'R$ ' . number_format($walletTransaction->balance, 2, ',', '.'),
            ];
        });
        
        return $transactions;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(60);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(15);

                $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(30);
                $event->sheet->getDelegate()->getStyle('A1:E1')->getFont()->setSize(12);
                $event->sheet->getDelegate()->getStyle('A1:E1')->getFont()->setBold(true);
                $event->sheet->getDelegate()->getStyle('A1:E1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('A1:E1')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

                $event->sheet->getDelegate()->getStyle('D2:E' . $event->sheet->getDelegate()->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
                $event->sheet->getDelegate()->getStyle('A2:A' . $event->sheet->getDelegate()->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('C2:C' . $event->sheet->getDelegate()->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('A2:E' . $event->sheet->getDelegate()->getHighestRow())->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
            },
        ];
    }

    public function headings(): array
    {
        return [
            'DATA TRANSAÇÃO',
            'DESCRIÇÃO',
            'OPERAÇÃO',
            'VALOR',
            'SALDO',
        ];
    }
}
