<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::where('bill_status',1)->get();
    }
    public function headings(): array
    {
        return [
            'order_id',
            'product_id',
            'table_id',
            'bill_status',
            'order_quantity',
            'subprice',
        ];
    }
}
