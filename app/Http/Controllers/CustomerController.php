<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customerdata = [];
        $customerlist = $this->customer_list();
        return view('customer',[
            'customerlist'=>$customerlist,
            'customerdata'=>$customerdata,
        ]);
    }

    public function add_customer(Request $request)
    {
        // dd($request);
        if (isset($request->customername)  && isset($request->customerphone)  && isset($request->customeraddress)  ) {
            $customer = new Customer;
            $customer->customer_username = $request->customername;
            $customer->customer_phone = $request->customerphone;
            $customer->customer_address = $request->customeraddress;
            $customer->save();
            return redirect('/customer')->with('message', 'customer Added');


        }
        elseif (isset($request->customername)  && isset($request->customerphone) ){

            $customer = new Customer;
            $customer->customer_username = $request->customername;
            $customer->customer_phone = $request->customerphone;
            $customer->save();
            return redirect('/customer')->with('message', 'customer Added');


        }
        else{
            return redirect('/customer')->with('message', 'Fill all box.');

        }
    }

    public function edit_customer($id)
    {
        $customerdata = Customer::find($id);
        $customerlist = $this->customer_list();
        return view('customer',[
            'customerdata'=>$customerdata,
            'customerlist'=>$customerlist,
        ]);
    }

    public function update_customer(Request $request)
    {
            // dd($request);
            $id = $request->id;
            if (isset($request->customername)  && isset($request->customerphone)  && isset($request->customeraddress)  ) {
                $customer = Customer::Find($id);
                $customer->customer_username = $request->customername;
                $customer->customer_phone = $request->customerphone;
                $customer->customer_address = $request->customeraddress;
                $customer->save();
                return redirect('/customer')->with('message', 'Customer Updated');


            }
            elseif (isset($request->customername)  && isset($request->customerphone) ){

                $customer = Customer::Find($id);
                $customer->customer_username = $request->customername;
                $customer->customer_phone = $request->customerphone;
                $customer->save();
                return redirect('/customer')->with('message', 'Customer Updated');


            }
            else{
                return redirect('/customer/'.$id)->with('message', 'Fill all box.');

            }

    }

    public function delete_customer($id)
    {
        Customer::where('customer_id',$id)->delete();
        return redirect('/customer')->with('message', 'Customer deleted');
    }


    private function customer_list()
    {
        $customerlist = Customer::all();
        return $customerlist;
    }

}
