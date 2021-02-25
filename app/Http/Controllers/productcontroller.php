<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class productcontroller extends Controller
{
    public function product()
    {
        $category = $this->categorylist();
        return view('add__product',[
            'categorylist'=>$category,
        ]);
    }

    public function index()
    {
        $product = $this->productlist();
        return view('product__list',[
            'productlist'=>$product,
        ]);
    }

    public function addproduct(Request $request)
    {

        $this->validate($request,[
            'productname'=>'required|min:1|max:50|unique:products,product_name',
            'productprice'=>'required|min:1|max:50',
            'category_id'=>'required',
        ]);

                $file  = new Product;
                $file->product_name = $request->productname;
                $file->product_price = $request->productprice;
                $file->category_id = $request->category_id;
                $file->save();
                return redirect('/product')->with('message', 'product upload');


    }

    public function edit_product($id)
    {
        // dd($id);
        $product  = Product::Find($id);
        $categorylist = $this->categorylist();
        return view('edit__product',[
            'product'=>$product,
            'categorylist'=>$categorylist,
        ]);
    }

    public function update_product(Request $request)
    {
        // dd($id);
        $id = $request->id;
        // dd($id);
        if ($request->hasFile('file')) {

            $file = $request->file('file');
            $destinationPath = 'img/';
            $originalFile = $file->getClientOriginalName();
            $file->move($destinationPath, $originalFile);
            $product  = Product::Find($id);
            $product->product_name = $request->productname;
            $product->product_price = $request->productprice;
            $product->category_id = $request->category_id;
            $product->product_image = $originalFile;
            $product->save();

        return redirect('/product')->with('message', 'product updated');
        }

        else{
            $product  = Product::Find($id);
            $product->category_id = $request->category_id;
            $product->product_name = $request->productname;
            $product->product_price = $request->productprice;
            $product->save();
          return redirect('/product')->with('message', 'product updated');


        }
    }
    public function deleteproduct(Product $id)
    {
        $id->delete();



            // Product::where('product_id',$id)->delete();
            return redirect('/product')->with('message', 'product deleted');


    }

    public function categorylist()
    {
        $category = Category::all();
        return $category;
    }
    public function productlist()
    {
        $product = Product::all();
        return $product;
    }
}
