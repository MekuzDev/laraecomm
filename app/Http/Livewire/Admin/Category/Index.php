<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $category_id;

    public function deleteCategory($category_id)
    {
        $this->category_id = $category_id;
        return;
    }
    public function destroyCategory()
    {
        $category = Category::findOrFail($this->category_id);
        if(File::exists('uploads/categories/'.$category->image)){
            File::delete('uploads/categories/' . $category->image);
        }
        $category->delete();
        $this->dispatchBrowserEvent('close-modal');
        // $this->emit('status', "Category Deleted Successfully");
        // return redirect()->route('admin.categories')->with('status', "Category Deleted Successfully");
    }
    public function render()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.category.index',['categories'=>$categories]);
    }
}
