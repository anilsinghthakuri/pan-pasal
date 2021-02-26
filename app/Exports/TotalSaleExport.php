<?php

namespace App\Exports;

use App\Bill;
use App\Models\Bill as ModelsBill;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TotalSaleExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $bill =  ModelsBill::all();
        return $bill;
    }

    public function map($bill): array
    {
        return [
            $bill->nepali_date,
            $bill->bill_id,
            $bill->payment_method->payment_method_name,
            $bill->bill_total_amount,
        ];
    }
    public function headings(): array
    {
        return [
            'Date',
            'bill_id',
            'Payment Method',
            'Bill Amount',
        ];
    }
}
