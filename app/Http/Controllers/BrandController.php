<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        return view('admin.brand.add-brand');
    }

    protected function brandInfoValidate($request){
        $this->validate($request,[
            'brand_name' =>'required|min:2',
            'brand_description' => 'required',
            'publication_status' =>'required'
        ]);
    }

    protected function saveBrandBasicInfo($request){
        $brand=new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->publication_status = $request->publication_status;
        $brand->save();
    }

    public function saveBrand(Request $request){
        $this->brandInfoValidate($request);
        $this->saveBrandBasicInfo($request);

        return redirect('/brand/add')->with('message','Brand Info Saved Successfully.');
    }

    public function manageBrand(){
        $brand= Brand::all();
        return view('admin.brand.manage-brand',[
            'brands'=>$brand
        ]);
    }

    public function unpublishedBrand($id){
        $brand=Brand::find($id);
        $brand->publication_status=0;
        $brand->save();

        return redirect('/brand/manage')->with('message','Brand Info Unpublished Successfully.');
    }

    public function publishedBrand($id){
        $brand=Brand::find($id);
        $brand->publication_status=1;
        $brand->save();

        return redirect('/brand/manage')->with('message','Brand Info Published Successfully.');
    }

    public function editBrand($id){
        $brand=Brand::find($id);
        return view('admin.brand.edit-brand',[
            'brand'=>$brand
        ]);
    }

    public function updateBrand(Request $request){
        $this->brandInfoValidate($request);
        $brand=Brand::find($request->brand_id);
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->publication_status = $request->publication_status;
        $brand->save();
        return redirect('/brand/manage')->with('message','Brand Info Updated Successfully.');

    }

    public function deleteBrand($id){
        $brand=Brand::find($id);
        $brand->delete();

        return redirect('/brand/manage')->with('message','Brand Info Deleted Successfully.');
    }
}
