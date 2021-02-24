<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Addcategory extends Component
{
    use WithFileUploads;
    public $category = [];
    public $category_name = '';
    public $category_image;
    public $editcategorydata = [];
    public function mount()
    {
        $this->category = $this->show_category();
    }

    public function show_category()
    {
        $category = Category::all();
        return $category;
    }



    public function addcategory()
    {
        $validatedData = $this->validate([
            'category_name' => 'required',
            'category_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validatedData['category_image'] = $this->category_image->store('photo','public');

        Category::create($validatedData);
        $this->category = $this->show_category();
        $this->category_name = '';

    }

    public function deletecategory($id)
    {
        DB::table('categories')->where('category_id', $id)->delete();
        $this->category = $this->show_category();

    }
    public function render()
    {
        return view('livewire.addcategory');
    }
}
