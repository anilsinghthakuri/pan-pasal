<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class categorycontroller extends Controller
{
    public function index()
    {
        $category = [];
        $categorylist = $this->categorylist();
        return view('product_category',[
            'categorylist'=>$categorylist,
            'category'=>$category,
        ]);
    }

    public function add_category(Request $request)
    {
        $request->validate([
            'categoryname'=>'required'
        ]);

        $category  = new Category;
        $category->category_name = $request->categoryname;
        $category->save();
        return redirect('/categories')->with('message', 'categories inserted');
    }

    public function edit_product_category($id)
    {
        $category = Category::Find($id);
        $categorylist = $this->categorylist();
        return view('product_category',[
            'categorylist'=>$categorylist,
            'category'=>$category,
        ]);
    }

    public function update_product_category(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'categoryname'=>'required|min:1|max:50'
        ]);

            $category  = Category::Find($id);
            $category->category_name = $request->categoryname;
            $category->save();

        return redirect('/categories')->with('message', 'category updated');


    }
    public function delete_category(Category $id)
    {
        $id->delete();
        return redirect('/categories')->with('message', 'category deleted');
    }


    private  function categorylist()
    {
        $categorylist = Category::all();
        return $categorylist;
    }


}
