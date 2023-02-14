<?php

namespace App\Exports;

use App\Models\Withdraw;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class WithdrawsExport implements FromCollection, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $withdraws = Withdraw::join('wallets', 'wallets.id', 'withdraws.wallet_id')
            ->join('bank_accounts', 'bank_accounts.id', 'withdraws.bank_account_id')
            ->join('banks', 'banks.id', 'bank_accounts.bank_id')
            ->where('wallets.user_id', Auth::user()->id)
            ->select('withdraws.*', 'bank_accounts.account_holder', 'bank_accounts.agency', 'bank_accounts.account','banks.name')
            ->orderBy('withdraws.created_at', 'desc')
            ->get();

        $withdraws = $withdraws->map(function ($withdraw) {
            return [
                'created_at' => Carbon::parse($withdraw->created_at)->format('d/m/Y H:i:s'),
                // if payment_date is null, return empty strings
                'payment_date' => $withdraw->payment_date ? Carbon::parse($withdraw->payment_date)->format('d/m/Y H:i:s') : '- - - - - - - - - --',
                // 'payment_date' => Carbon::parse($withdraw->payment_date)->format('d/m/Y H:i:s'),
                'status' => $withdraw->status == 1 ? 'CANCELADO' : ($withdraw->status == 2 ? 'PENDENTE' : 'PAGO'),
                'payment_type' => $withdraw->payment_type == 1 ? 'AUTOMÁTICO' : 'MANUAL',
                'account_holder' => strtoupper($withdraw->account_holder),
                'bank' => strtoupper($withdraw->name),
                'agency' => $withdraw->agency,
                'account' => $withdraw->account,             
                'value_withdraw' => 'R$ ' . number_format($withdraw->value_withdraw, 2, ',', '.'),
            ];
        });
        return $withdraws;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(17);
                $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(17);
                $event->sheet->getDelegate()->getColumnDimension('I')->setWidth(22);

                $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(30);
                $event->sheet->getDelegate()->getStyle('A1:I1')->getFont()->setSize(12);
                $event->sheet->getDelegate()->getStyle('A1:I1')->getFont()->setBold(true);
                $event->sheet->getDelegate()->getStyle('A1:I1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('A1:I1')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

                $event->sheet->getDelegate()->getStyle('I2:I' . $event->sheet->getDelegate()->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
                $event->sheet->getDelegate()->getStyle('A2:D' . $event->sheet->getDelegate()->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('G2:H' . $event->sheet->getDelegate()->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('A2:I' . $event->sheet->getDelegate()->getHighestRow())->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
            },
        ];
    }
    
    public function headings(): array
    {
        return [
            'DATA SOLICITAÇÃO',
            'DATA PAGAMENTO',
            'STATUS',
            'TIPO PAGAMENTO',
            'FAVORECIDO',
            'BANCO',
            'AGÊNCIA',
            'CONTA',
            'VALOR SOLICITADO',
        ];
    }
}
