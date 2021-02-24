<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Customer;
use App\Models\CustomerCredit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerCreditController extends Controller
{
    public function index()
    {

        $creditlist  = $this->show_credit_list();
        return view('credit',[
            'creditlist'=>$creditlist,
        ]);
    }



    public function single_credit_show($id)
    {
        $credit_info = $this->show_one_credit_list($id);
        // dd($credit_info);
        $remaining = $credit_info->total_amount_to_pay - $credit_info->amount_paid;
        // dd($remaining);
        $billlist = $this->show_bill_list($id);
        $customer_info = $this->customer_info($id);
        return view('single_credits',[
            'customer_info'=>$customer_info,
            'billlist'=>$billlist,
            'remaining'=>$remaining,
            ]);
    }

    public function single_credit_update(Request $request)
    {
        $id = $request->id;
        $creditlist = $this->show_one_credit_list($id);

        $oldamount_paid = $creditlist->amount_paid;

        $newamount = $oldamount_paid + $request->amount;

        CustomerCredit::where('customer_id',$id)->update(['amount_paid'=>$newamount]);
        $customer = CustomerCredit::where('customer_id',$id)->first();

        $balance_amount = $customer->total_amount_to_pay - $customer->amount_paid;

        CustomerCredit::where('customer_id',$id)->update(['amount_paid'=>$newamount,'balance_amount'=>$balance_amount]);

        return back()->with('message','Amount Updated');


        // dd($oldamount);

        // $credit  = CustomerCredit::where('cre')

    }

    private function show_bill_list($id)
    {
        $billlist = Bill::where('customer_id',$id)->get();
        return $billlist;
    }

    private function customer_info($id)
    {
        $customer_info = DB::table('customers')->where('customer_id',$id)->first();
        return $customer_info;
    }


    public function search_customer(Request $request)
    {
        $customer  = $this->find_customer($request->customername);
        dd($customer);
    }

    private function show_credit_list(){
        $creditlist = CustomerCredit::where('balance_amount', '!=' , 0)->get();
        return $creditlist;
    }

    private function show_one_credit_list($id){
        $creditlist = DB::table('customer_credits')->where('customer_id',$id)->first();
        return $creditlist;
    }

    private function find_customer($name)
    {
        $searchterm = "%".$name."%";
        $customer = Customer::where('customer_username','LIKE',$searchterm)->get();
        return $customer;
    }
}
