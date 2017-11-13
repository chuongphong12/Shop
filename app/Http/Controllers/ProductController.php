<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Input;
use File;
use App\Product;
use App\ProductType;
use App\ProductImage;
use Request;
use Auth;

class ProductController extends Controller
{
    public function getAdd(){
    	$cats = ProductType::all();
    	return view ('admin.products.add',compact('cats'));
    }
    public function postAdd(ProductRequest $request){
    	$file_name = $request->file('fImages')->getClientOriginalName(); 
    	$product = new Product();
    	$product->name = $request->txtProductName;
        $product->id_type = $request->sltParent;
        $product->description = $request->txtDescription;
        $product->unit_price = $request->txtUnit_price;
        $product->promotion_price = $request->txtPromotion_price;
    	$product->image=$file_name;
        $product->unit = $request->txtUnit;
        $product->new = 1;
    	$request->file('fImages')->move('sources/image/product/',$file_name);
    	$product->save();

    	$product_id = $product->id;
    	return redirect()->route('admin.products.getList')->with(['flash_message'=>'Sản phẩm được thêm mới thành công !']);
    }
    public function getList(){
    	$data =Product::select('id','name','id_type','description','unit_price','promotion_price','unit','created_at')->orderBy('id','DESC')->get()->toArray();
        return view('admin.products.list',compact('data'));
    }
    public function getDelete($id){
    	// Rang buoc du lieu khi xoa product 
        $product = Product::find($id);
        // Xoa hinh trong product
        File::delete('sources/image/product/'.$product->image);
        // Xoa du lieu trong bang Product
        $product->delete($id);
    	
    	return redirect()->route('admin.products.getList')->with(['flash_message'=>'Sản phẩm đã được xóa !']);
    }
    public function getEdit($id){
        $cats = ProductType::all();
        $product = Product::find($id);
        return view('admin.products.edit',compact('cats','product'));
    }
    public function postEdit($id ,Request $request){
        
        $product = Product::find($id);
        $product->name=Request::input('txtProductName');
        $product->id_type=Request::input('sltParent');
        $product->description=Request::input('txtDescription');
        $product->unit_price=Request::input('txtUnit_price');
        $product->promotion_price=Request::input('txtPromotion_price');
        $product->unit=Request::input('txtUnit');
        $product->new = Request::input('rdoNew');
        $img_current = 'sources/image/product/'.Request::input('img_current');
        if (!empty(Request::file('fImages'))) {
            $file_name = Request::file('fImages')->getClientOriginalName();
            $product->image = $file_name;
            Request::file('fImages')->move('sources/image/product/',$file_name);
            if (File::exists($img_current)) {
                File::delete($img_current);
            }
        }
        else{
            echo "Không có file";
        }
        $product->save();
        return redirect()->route('admin.products.getList')->with(['flash_message'=>'Sản phẩm sửa thành công !']);
    }

    public function getDetail($id){
        $data = Product::findOrFail($id)->toArray();
        return view('admin.products.details',compact('data','id'));
    }
    public function getDelImg($id){
        $idPic = (int)Request::get('idPic');
        $image_detail = ProductImage::find($idPic);
        if (!empty($image_detail)) {
            $img = 'resources/upload/detail/'.$image_detail->image;
            if (File::exists($img)) {
                File::delete($img);
            }
            $image_detail->delete();
        }
        return "Oke";
    }
}
