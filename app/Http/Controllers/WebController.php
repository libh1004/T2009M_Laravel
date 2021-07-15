<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WebController extends Controller
{
//    public function home(){
//        return view("home");
//    }

//    public function aboutUs(){
//        return view("about-us");
//    }
//
//    public function home(){
//        return view("ass5/home");
//    }
//
//    public function categories(){
//        return view("ass5/categories");
//    }
//    public function createCategory(){
//        return view("ass5/create-category");
//    }
//    public function categoryDetail(){
//        return view("ass5/category-detail");
//    }
//    public function editCategory(){
//        return view("ass5/edit-category");
//    }
//    public function deleteCategory(){
//        return view("ass5/categories");
//    }
//
//    public function products(){
//        return view("ass5/products");
//    }
//    public function createProduct(){
//        return view("ass5/create-product");
//    }
//    public function productDetail(){
//        return view("ass5/product-detail");
//    }
//    public function editProduct(){
//        return view("ass5/edit-product");
//    }
//
//    public function deleteProduct(){
//        return view("ass5/products");
//    }
//
//    // them sp vao gio hang
//    public function addToCart($id){
//        // tim sp
//        $product = Product::findOrFail($id);
//        // cho sp vao gio hang - session
//        $cart = []; // mac dinh ban dau la chua co sp nao
//        if(Session::has("cart")){
//            $cart = Session::get("cart");
//        }
//        // kiem tra xem gio hang da co sp nay chua
//        if(!$this->checkCart($cart,$product)){ // neu sp chua co trong gio hang
//            $product->cart_qty = 1;// them 1 thuoc tinh cart_qty
//            $cart[] = $product; // nap vao gio hang
//        }else{
//            for($i=0;$i<count($cart);$i++){
//                if($cart[$i]->id == $product->id){
//                    $cart[$i]->cart_qty = $cart[$i]->cart_qty+1;
//                    break;
//                }
//            }
//        }
//        // gan tra lai cart vao session
//        Session::put("cart",$cart);
//        return redirect()->back();
//
//    }
//    // tim kiem san pham co trong array ko
//    private function checkCart(array $cart,Product $p){
//        foreach ($cart as $item){
//            if($item->id == $p->id)
//                return true;
//        }
//        return false;
//    }
//
//    public function cart(){
//        $cart = Session::get("cart");
//        return view("cart.cart",["cart"=>$cart]);
//    }
//    public function hello(){
//        return view("hello");
//    }
//
//    public function list_book(Request $request){
//        $search = $request->get("search");
//        $books = Book::all()->search($search)->paginate(10);
//        return view("book.books",[
//            "books" => $books
//        ]);
//    }

    public function create_book(){
        return view("book.create_book");
    }
    public function save_book(Request $request){
        try{
            Book::create([
                "author_id" => $request->get("author_id"),
                "title"=> $request->get("title"),
                "isbn" => $request->get("isbn"),
                "pub_year" => $request->get("pub_year"),
                "available" => $request->get("available"),
            ]);
            return redirect()->to("/books");
        }catch (\Exception $e){
            abort(404);
        }
    }

}
