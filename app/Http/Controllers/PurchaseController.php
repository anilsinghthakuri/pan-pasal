<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{


    public function show_purchase_category()
    {
        $categories_purchase = [];
        $purchase_category = $this->pull_purchase_category();
        return view('purchase.add__purchase_category',[
            'purchase_category'=>$purchase_category,
            'categories_purchase'=>$categories_purchase,
        ]);
    }

    public function add_purchase_category(Request $request)
    {
        if (isset($request->categoryname)) {
            DB::table('categories_purchase')->insert([
                'purchase_category_name' => $request->categoryname,

            ]);
            return redirect('/purchase-category')->with('message', 'Category  upload');

        }
    }

    public function edit_purchase_category($id)
    {
        $categories_purchase = DB::table('categories_purchase')->where('purchase_category_id',$id)->first();
        // dd($categories_expense);
        $purchase_category = $this->pull_purchase_category();

        return view('purchase.add__purchase_category',[
            'categories_purchase'=>$categories_purchase,
            'purchase_category'=>$purchase_category,

        ]);
    }

    private function pull_purchase_category(){
        $purchase_category = DB::table('categories_purchase')->get();
        return $purchase_category;
    }
}
