<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index') ;
    }

    public function showCreateForm()
    {
        return view('admin.categories.create');
    }

    public function create(CategoryFormRequest $request){
        $validatedData = $request->validated();
        $category = new Category;

            $category->name = $validatedData['name'];
            $category->slug= $validatedData['slug'];
            $category->description = $validatedData['description'];

            if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '_.' . $ext;
            $file->move('uploads/categories/', $filename);
            $category->image = $filename;
            }
            $category->meta_title = $validatedData['meta_title'];
            $category->meta_keyword = $validatedData['meta_keyword'];
            $category->meta_description = $validatedData['meta_description'];
            $category->status = $request->status == true ? '1' : '0';
            $category->save();
            return redirect()->route('admin.categories')->with('status', 'Category add successfully');


    }

    public function showEditForm(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }
    public function edit(CategoryFormRequest $request, Category $category)
    {
        $validatedData = $request->validated();
        $category->name = $validatedData['name'];
        $category->slug= $validatedData['slug'];
        $category->description = $validatedData['description'];


        if ($request->hasFile('image')) {
            $path = 'uploads/categories/' . $category->image;
            if(File::exists($path)){
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '_.' . $ext;
            $file->move('uploads/categories/', $filename);
            $category->image = $filename;


        }


        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];
        $category->status = $request->status == true ? '1' : '0';

        $category->update();
        return redirect()->route('admin.categories')->with('status',"Category was updated successfully...");
    }

}




