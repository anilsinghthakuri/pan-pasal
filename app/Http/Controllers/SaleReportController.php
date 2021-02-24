<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleReportController extends Controller
{
    public function index_total_sale()
    {
        $total_sale_report = $this->fetch_total_sale_report();
        return view('sale_report.total_sale',[
            'total_sale_report'=>$total_sale_report,
        ]);
    }

    public function index_cash_sale()
    {
        $cash_sale_report = $this->fetch_cash_sale_report();
        return view('sale_report.cash_sale',[
            'cash_sale_report'=>$cash_sale_report,
        ]);
    }

    public function index_credit_sale()
    {
        $credit_sale_report = $this->fetch_credit_sale_report();
        return view('sale_report.credit_sale',[
            'credit_sale_report'=>$credit_sale_report,
        ]);
    }

    private function fetch_total_sale_report(){
        $total_sale_report = Bill::all();

        return $total_sale_report;
    }

    private function fetch_cash_sale_report(){
        $cash_sale_report = Bill::where('payment_method_id','1')->get();
        // dd($cash_sale_report);
        return $cash_sale_report;
    }

    private function fetch_credit_sale_report(){
        $credit_sale_report = Bill::where('payment_method_id','2')->get();
        // dd($cash_sale_report);
        return $credit_sale_report;
    }
}
