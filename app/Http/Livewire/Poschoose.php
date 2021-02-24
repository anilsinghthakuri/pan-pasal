<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Poschoose extends Component
{

    public $product = [];
    public $listeners = ['quant'];
    public $categorylist  = [];
    public $category  = 0;
    public $search ;

    use WithPagination;


    public function mount()
    {
        if ($this->category == 0) {
            $this->product = Product::all();
            $this->categorylist = $this->categoryshow();
        }


    }


    public function addproduct($id = null)
    {
        if ($id == null) {
            session()->flash('message', 'Enter Product Code');
            $this->search = '';
        }
        else{
            $status = $this->check_item_code($id);

            if ($status == null) {

                session()->flash('message', 'product not found');
                $this->search = '';


            }

            else{

                $this->emitTo('possale','orderadd',$id);
                $this->search = '';

            }
        }


    }


    public function categoryshow()
    {
        $categorylist = Category::all();
        return $categorylist;
    }

    public function choosecategory($id)
    {
        $this->category = $id;
        $this->product = Product::where('category_id',$id)->get();
    }

    public function updatedSearch()
    {
        // dd($this->search);
         $searchterm = "%".$this->search."%";

        $this->product = Product::where('product_id','Like',$searchterm)->get();

        // $this->product  =  DB::statement("select * from products where product_id like".$searchterm."or product_name like".$searchterm);
        // dd($this->product);
    }
    // public function search_product($name)
    // {
    //     $this->category = $id;
    //     $this->product = Product::where('category_id',$id)->get();
    // }

    public function allproduct()
    {

        $this->product = Product::all();
    }

    public function check_item_code($id)
    {
        $product = [];
        if ($id == null) {
            $product = [];

        }
        else{
            $product = DB::table('products')->where('product_id',$id)->first();

        }

        return $product;
    }


    public function render()
    {
        return view('livewire.poschoose');
    }
}
