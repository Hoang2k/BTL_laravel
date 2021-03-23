<?php

namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\product;

class AdminController extends Controller
{
    public function index(){
        $cate=Category::all();
        $products=product::with('Category')->paginate(15);
        
        return view('admin.indexx',[
            'product'=>$products,
          //  'category'=>$cate
        ]);
    }
    public function getProductById($id ){
         $product=product::find($id);
       //  $category=category::where('id',$product['category_id'])->get();
        // dd($category);
        
       return view('admin.product',[
           'product'=>$product,
         //  'categories'=>$category,
       ]);
        

    }
    public function updateProduct(Request $request){
       $product=product::find($request->id);
        $product->name=$request->input('name');
        $product->price=$request->input('price');
        $product->price_sale=$request->input('price_sale');
        $product->description=$request->input('description');
        $product->category_id=$request->input('category_id');
        $product->save();
        return redirect ('/admin/listProduct')->with('success','Cập nhật sản phẩm thành công');
        
    }
    public function addProduct(Request $request){
       // $cate=Category::all();
       // checkdate();
       $request->validate([
        'name'=>'required|min:4|',
        'price'=>'required|numeric|between:1,1000000000',
       ],
       [
        'name.required'=>'Tên sản phẩm không được để trống',
        'name.min'=>'Tên sản phẩm quá ngắn',
      //  'name.alpha'=>'Tên sản phẩm phải là dạng chữ',
        'price.numeric '=>'Giá tiền phải là dạng số',
        'price.between'=>'Giá tiền phải lớn hơn 0',
    ]
    );
        $product =new product();
        $product->name=$request->input('name');
        $product->price=$request->input('price');
        $product->price_sale=$request->input('price_sale');
       $product->description=$request->input('description');
       $product->quantity=$request->input('quantity');
       $product->category_id=$request->input('category_id');

      //  $product->images=$request->input('image');
         $r=$product->save();
         if(!$r)return back()->withErrors('error','Thêm Sản Phẩm Thất Bại');
         return back()->with('success','Thêm sản phẩm thành công');
    }
    public function checkValidate()
    {
        $request->Validate([
            'name'=>'required|min:6',
        ],
    [
        'name.required'=>'Tên sản phẩm không được để trống',
    ]);
    }
    public function deleteProduct($id){
         $product=product::find($id);
          // dd($product);
         $del=$product->delete();
          if($del) return back()->with('success','Xóa sản phẩm Thành Công');
    }

    public function getSearchProduct(Request $request){
        $product=product::where('name','like','%'.$request->search.'%')->orWhere('price',$request->search)->paginate(10);
     //   dd($product);
        return view('admin.search',[
            'product'=>$product
            
        ]);
         
        
    }
    public function home(){
        $logUser=Auth::user();
     //   dd($logUser);
      if(!$logUser)return redirect()->back->withError('Không Xác Định User Đăng Nhập');
      else
        return view('admin.home',[
            'user'=>$logUser
        ]);
    }

}
