<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrdersExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $order =  Order::where('bill_status',1)->with('product')->get();
        // dd($order);
        return $order;
    }

    public function map($order): array
    {
        return [
            $order->nepali_date,
            $order->order_id,
            $order->product->product_name,
            $order->order_quantity,
            $order->order_subprice,
        ];
    }
    public function headings(): array
    {
        return [
            'Date',
            'order_id',
            'product_name',
            'order_quantity',
            'subprice',
        ];
    }
}
