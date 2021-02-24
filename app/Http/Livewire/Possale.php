<?php

namespace App\Http\Livewire;

use App\Models\Kot;
use App\Models\Order;
use App\Models\Product;
use App\Models\Table;
use Livewire\Component;

class Possale extends Component
{
    public $order = [];
    public $table;
    public $tableid = [];
    public $totalprice  = 0;
    public $shipping = 0;
    public $discount = 0;
    public $grandprice = 0;
    public $listeners = ['orderadd','refreshaftersell'];


    public function mount()
    {
        $this->shipping = 0;
        $this->discount = 0;
        $this->tableid = $this->tablenameid();
        $this->table = 0;
        $this->order  = Order::where('table_id',$this->table)->where('bill_status',0)->get();
        $this->totalprice = $this->totalamt();
        $this->grandprice = $this->grandpricecalc();

    }
    public function updatedTable()
    {
        $this->order  = Order::where('table_id',$this->table)->where('bill_status',0)->get();
        $this->totalprice = $this->totalamt();
        $this->grandprice = $this->grandpricecalc();
        $this->discount = 0;


    }

    public function orderadd($id)
    {

        if ($this->table == 0) {
            session()->flash('message', 'Choose table to add product!');
        }
        else{
            $check = [];
            $checkproduct = Order::where('product_id',$id)->where('bill_status',0)->where('table_id',$this->table)->get();
            foreach ($checkproduct as $key => $value) {
                $check[] = $checkproduct[$key]['product_id'];
            }

            if (in_array($id,$check)) {
                // dd('xa producd');
                foreach ($checkproduct as $key => $value) {
                    $id_order = $checkproduct[$key]['order_id'];
                    $this->inc($id_order);
                }


            }
            else{
            $order = new Order;
            $order->table_id = $this->table;
            $order->product_id = $id;
            $product = Product::Find($id);

            $price = $product['product_price'];

            $order->order_quantity = 1;
            $order->order_subprice = $price;
            $order->save();

            //save product on kot table by calling kot_product_add function
            $this->kot_product_add($id);

            $this->totalprice = $this->totalprice + $price;
            $this->grandprice = $this->grandpricecalc();


            $this->order  = Order::where('table_id',$this->table)->where('bill_status',0)->get();
            }

        }

    }

    public function inc($order_id)
    {
        // dd($order_id);
        $order = [];
        $quant = 0;
        $subprice = 0;
        $price = 0;
        $order = Order::Find($order_id);


        $product_id = $order['product_id'];
        $product = Product::Find($product_id);
        $price = $product['product_price'];


        $quant = $order['order_quantity'];
        $quant ++;
        $subprice = $price*$quant;
        $order['order_quantity'] = $quant;
        $order['order_subprice'] = $subprice;
        $order->save();

        $this->kot_product_add($product_id);

        $this->totalprice = $this->totalamt();
        $this->grandprice = $this->grandpricecalc();


        $this->order  = Order::where('table_id',$this->table)->where('bill_status',0)->get();

    }
    public function dec($order_id)
    {
        // dd($order_id);
        $order = [];
        $quant = 0;
        $subprice = 0;
        $price = 0;
       $order = Order::Find($order_id);
        if ($order['order_quantity'] > 1) {
            $product_id = $order['product_id'];
            $product = Product::Find($product_id);
            $price = $product['product_price'];

            $quant = $order['order_quantity'];
            $quant --;
            $subprice = $price*$quant;

            $order['order_quantity'] = $quant;
            $order['order_subprice'] = $subprice;
            $order->save();
            $this->remove_kot_product($product_id);

            $this->totalprice = $this->totalamt();
            $this->grandprice = $this->grandpricecalc();


            $this->order  = Order::where('table_id',$this->table)->where('bill_status',0)->get();
        }
    }

    public function totalamt()
    {
        $total = [];
        $total_price = 0;

        $order = Order::where('table_id',$this->table)->where('bill_status',0)->get();
        foreach ($order as $key => $value) {
            $total[] = $order[$key]['order_subprice'];
        }

        $total_price = array_sum($total);
        return $total_price;
    }
    public function deleteorder($order_id)
    {
        // dd($order_id);
        $order = Order::Find($order_id);
        $subprice = $order['order_subprice'];
        $product = $order['product_id'];
        $this->totalprice = $this->totalprice - $subprice;
        $this->grandprice = $this->grandpricecalc();

        $this->remove_all_one_product_kot($product);

        Order::where('order_id',$order_id)->delete();
        $this->order  = Order::where('table_id',$this->table)->where('bill_status',0)->get();
    }
    public function tablenameid()
    {
        $tableid = [];
        // $table = Table::all();
        // foreach ($table as $key => $value) {
        //     $tableid[] = $table[$key]['table_id'];
        // }
        $tableid = Table::all();
        return $tableid;
    }
    public function grandpricecalc()
    {
        $grandprice = $this->totalprice ;
        $this->emit('changecalc',$this->table,$grandprice);
        return $grandprice;
    }

    public function updatedDiscount()
    {
        if ($this->discount == null) {
            $discount = 0;
            $this->grandprice = $this->grandprice - $discount;
            $this->emit('changecalc',$this->table,$this->grandprice);
        }else{
            $this->grandprice = $this->grandpricecalc();
            $this->grandprice = $this->grandprice - $this->discount;
            $this->emit('changecalc',$this->table,$this->grandprice);
        }

    }

    public function updatedShipping()
    {
        if ($this->shipping== null) {
            $shipping = 0;
            $this->grandprice = $this->grandprice + $shipping;
            $this->emit('changecalc',$this->table,$this->grandprice);
        }else{
            $this->grandprice = $this->grandpricecalc();
            $this->grandprice = $this->grandprice + $this->shipping;
            $this->emit('changecalc',$this->table,$this->grandprice);
        }

    }

    public function refreshaftersell()
    {
        $this->order  = Order::where('table_id',$this->table)->where('bill_status',0)->get();
    }

    //for kot product add

    public function kot_product_add($id)
    {
        $kotproduct = new Kot();
        $kotproduct->product_id = $id;
        $kotproduct->table_id = $this->table;
        $kotproduct->save();
    }

    public function remove_kot_product($id)
    {
        // Kot::where('product_id',$id)->delete();
        Kot::where('product_id',$id)->first()->delete();
        // dd($data);

    }

    public function remove_all_one_product_kot($id)
    {
        Kot::where('product_id',$id)->delete();
    }



    public function render()
    {
        return view('livewire.possale');
    }
}
