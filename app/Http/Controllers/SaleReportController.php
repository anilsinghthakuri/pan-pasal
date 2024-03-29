<?php

namespace App\Http\Controllers;
require_once __DIR__ . '../../../../vendor/autoload.php';

use Nilambar\NepaliDate\NepaliDate;
use App\Exports\OrdersExport;
use App\Exports\TotalSaleExport;
use App\Models\Bill;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class SaleReportController extends Controller
{
    public function index_total_sale()
    {
        $total_sale_report = $this->fetch_total_sale_report();
        $amount  = $this->calc_total_sale_amount();
        return view('sale_report.total_sale',[
            'total_sale_report'=>$total_sale_report,
            'amount' => $amount
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

    private function calc_total_sale_amount()
    {
        // $sale_amount = DB::table('bills')->select('bill_total_amount')->get();
        $sale_amount = Bill::all();
        $total = [];
        foreach ($sale_amount as $key => $value) {
            $total[] = $sale_amount[$key]['bill_total_amount'];
        }
        $amount = array_sum($total);
        return $amount;
    }

    public function export()
    {
        $date = $this->nepalidate();
        return Excel::download(new TotalSaleExport, 'Sale report until '.$date.'.xlsx');
    }

    public function nepalidate()
    {
        $endate = Carbon::now();
        $year = $endate->year;
        $month = $endate->month;
        $day = $endate->day;

        $obj = new NepaliDate();

        $date = $obj->convertAdToBs($year, $month, $day);

        $current_year = $date['year'];
        $current_month = $date['month'];
        $current_day = $date['day'];

        $current_date = $current_year.'-'.$current_month.'-'.$current_day;

        return $current_date;

    }
}
