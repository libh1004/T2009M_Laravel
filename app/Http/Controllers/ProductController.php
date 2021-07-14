<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

use Carbon\Carbon;
use Illuminate\Database\Console\Migrations\ResetCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function productsCate($id){
        $categories = Category::all();
        $products = Product::where("category_id",$id)->get();
        return view("admin.product.list",[
            "products"=>$products,
            "categories" => $categories
        ]);
    }
//    public function all(Request $request){
//        // row sql: khi can noi nhieu bang
//                // sql = "select * from products";
//        //        $products = DB::row($sql);
//
//        //use model:
////        $products = Product::all();
//        // noi bang
////        $products = Product::leftJoin("categories","categories.id","=","products.category_id")
////        ->select("products.*","categories.name as category_name")->get();
//
//        // su dung relationship , su dung cac model de ket noi voi nhau
////        $products = Product::with("Category")->get();
//        // pagination
//        $categoryId = $request->get("category_id");
//        $search = $request->get("search");
//        // chi danh cho so luong 1 2 cai can loc
////        if($categoryId && $search){
////
////        }else if ($search){
////
////        }else if($categoryID){
////
////          }else{
////
//
//        // su dung scope search
//        $products = Product::with("Category")->search($search)->category($categoryId)->panigate(20);
////        if($categoryId){
////            $products = Product::with("Category")->where("category_id",$categoryId)->paginate(20);
////
////        }
////        $products = Product::with("Category")->paginate(20);
//
//        // dd($products); // print data de kiem tra
//        $categories = Category::all();
//        return view("product.list",[
//            "products"=>$products,
//            "categories"=>$categories,
//        ]);
//    }
    public function all(Request  $request)
    {
        $categoryId = $request->get("category_id");
        $search = $request->get("search");
        $products = Product::with("Category")->search($search)->category($categoryId)->orderBy("id","desc")->paginate(20);
        $categories = Category::all();
        return view("admin.product.list",[
            "products"=>$products,
            "categories"=>$categories,
        ]);

    }
    public function form(){
        $categories = Category::all();
        return view("admin.product.form",[
            "categories"=>$categories,
        ]);
    }
    public function save(Request $request){
        $request->validate([
            "name"=>"required",
            "price"=>"required|numeric|min:0",
            "qty"=>"required|numeric|min:0",
            "category_id"=>"required|numeric|min:1"
        ],[
            "name.required"=>"Vui long nhap ten san pham",
            "price.required"=>"Vui long nhap gias san pham",
            "qty.required"=>"Vui long nhap so luong",
            "category_id.required"=>"Vui long nhap category_id",
        ]);
        try{
//            $image="";
//            // la the nao do de up file len public va lay link anh dua vao bien $image
//            if($request->hasFile("image")){
//                $file = $request->file("image");// tao 1 doi tuong file
//                $fileName = time().$file->getClientOriginalName();// lay ten file goc (ten khi up len)
//                // time() gan thoi gian vao thoi diem upfile, de ko bi mat di file cu khi up load 2 file co ten trung nhau
//                $ext  = $file->getClientOriginalExtension();// lay ten loai file (vi du : png, jpg...)
//                $fileSize = $file->getSize();// dung de gioi han kich thuoc tep up len neu can( tinh bang Byte)
//                if($ext == "png" || $ext =="jpg" || $ext=="jeg" || $ext =="gif"){ // chi cho upload nhung file dang nay
//                    if($fileSize<10000000){ // ko qua 10MB
//                        // copy file vao thu vien
//                        $file->move("upload",$fileName);
//                        $image = "upload/".$fileName;
//                    }
//                }
//            }
            Product::create([
                "name"=>$request->get("name"),
//                "image"=>$image,
                "price"=>$request->get("price"),
                "qty"=>$request->get("qty"),
                "category_id"=>$request->get("category_id"),
                "description"=>$request->get("description"),
            ]);
            return redirect()->to("admin/products");
        }catch (\Exception $e){
            abort(404);
        }
    }
    public function edit($id){
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view("admin.product.edit-product",[
            "categories"=>$categories,
            "product"=>$product
        ]);
    }
    public function update(Request $request,$id){
        $product = Product::findOrFail($id);
        $request->validate([
            "name"=>"required",
            "price"=>"required|numeric|min:0",
            "qty"=>"required|numeric|min:0",
            "category_id"=>"required|numeric|min:1",
        ],[
            "name.required"=>"Vui long nhap ten san pham",
            "price.required"=>"Vui long nhap gia san pham",
            "qty.required"=>"Vui long nhap so luong san pham",
            "category_id"=>"Vui long nhap category_id",
        ]);
        try{
            $product->update([
                "name"=>$request->get("name"),
                "price"=>$request->get("price"),
                "qty"=>$request->get("qty"),
                "category_id"=>$request->get("category_id"),
                "description"=>$request->get("description"),
            ]);
            return redirect()->to("admin/products");
        }catch (\Exception $e){
            abort(404);
        }
    }
    public function delete($id){
        $product = Product::findOrFail($id);
        try{
            $product->delete();
            return redirect()->to("admin/products");
        }catch (\Exception $e){
            abort(404);
        }
    }
}
