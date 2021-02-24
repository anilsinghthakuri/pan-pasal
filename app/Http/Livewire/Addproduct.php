<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Addproduct extends Component
{
    public $productlist = [];
    public $categorylist = [];
    public $product_name = '';
    public $product_price = '';
    public $product_image;
    public $category_id = 0;
    public function mount()
    {
        $this->productlist = $this->show_product();
        $this->categorylist = $this->show_category();
    }

    public function show_product()
    {
        $product = Product::all();
        return $product;
    }

    public function show_category()
    {
        $category = Category::all();
        return $category;
    }
    public function addproduct()
    {
        $validatedData = $this->validate([
            'product_name' => 'required',
            'product_price' => 'required',
            'category_id' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,svg,jpg,gif|max:1024',
        ]);

        $imageName = $this->image->store("images",'public');

        $validatedData['product_image'] = $imageName;

        Product::create($validatedData);

        session()->flash('status', 'Product  Uploaded');
    }

    public function render()
    {
        return view('livewire.addproduct');
    }
}
