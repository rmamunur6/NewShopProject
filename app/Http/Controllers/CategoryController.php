<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.add-category');
    }

    protected function categoryInfoValidate($request){
        $this->validate($request,[
            'category_name' =>'required|min:2',
            'category_description' => 'required',
            'publication_status' =>'required'
        ]);
    }

    protected function saveCategoryBasicInfo($request){
        $category=new Category();
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;
        $category->save();
    }

    public function saveCategory(Request $request){
        $this->categoryInfoValidate($request);
        $this->saveCategoryBasicInfo($request);

        return redirect('/category/add')->with('message','Category Info Saved Successfully.');
    }

    public function manageCategory(){
        $categories= Category::all();
        return view('admin.category.manage-category',[
            'categories'=>$categories
        ]);
    }

    public function unpublishedCategory($id){
        $category=Category::find($id);
        $category->publication_status=0;
        $category->save();

        return redirect('/category/manage')->with('message','Category Info Unpublished Successfully.');
    }

    public function publishedCategory($id){
        $category=Category::find($id);
        $category->publication_status=1;
        $category->save();

        return redirect('/category/manage')->with('message','Category Info Published Successfully.');
    }

    public function editCategory($id){
        $category=Category::find($id);
        return view('admin.category.edit-category',[
            'category'=>$category
        ]);
    }

    public function updateCategory(Request $request){
        $this->categoryInfoValidate($request);
        $category=Category::find($request->category_id);
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;
        $category->save();
        return redirect('/category/manage')->with('message','Category Info Updated Successfully.');

    }

    public function deleteCategory($id){
        $category=Category::find($id);
        $category->delete();

        return redirect('/category/manage')->with('message','Category Info Deleted Successfully.');
    }


}
