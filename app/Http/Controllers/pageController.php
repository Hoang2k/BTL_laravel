<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\product;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class pageController extends Controller
{
    public function index(){
        $slide=Slide::all();
        $category=category::all();
     //   $product_new=product::select('SELECT * FROM products ORDER BY id DESC LIMIT 1')->get();
     $product_new=product::where('status',1)->get();
       // dd($product_new);
        return view('frontEnd.index',[
            'category'=>$category,
            'slide'=>$slide,
            'product_new'=>$product_new,
        ]);
    }
    public function getProductType(Request $request){
        $id=$request->id;
          $product=product::where('category_id',$id)->get();
         return view('frontend.productType',[
             'product'=>$product,
         ]);
    }
}
