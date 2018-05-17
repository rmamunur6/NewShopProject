<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class NewShopController extends Controller
{
    public function index(){
        $newProducts=Product::where('publication_status',1)
                                        ->orderBy('id','DESC')
                                        ->take(8)
                                        ->get();
        return view('front-end.home.home-content',[
            'newProducts'=>$newProducts
        ]);
    }

    public function categoryProduct($id){
        $categoryProducts=Product::where('category_id',$id)
                                    ->where('publication_status',1)
                                    ->get();
        return view('front-end.category.category-content',[
            'categoryProducts'=>$categoryProducts
        ]);
    }

    public function productsDetails($id){
        $product=Product::find($id);
        return view('front-end.product.product-details',[
            'product'=>$product
        ]);
    }


}
