<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
//    public function home(){
//        return view("home");
//    }

    public function aboutUs(){
        return view("about-us");
    }

    public function home(){
        return view("ass5/home");
    }

    public function categories(){
        return view("ass5/categories");
    }
    public function createCategory(){
        return view("ass5/create-category");
    }
    public function categoryDetail(){
        return view("ass5/category-detail");
    }
    public function editCategory(){
        return view("ass5/edit-category");
    }
    public function deleteCategory(){
        return view("ass5/categories");
    }

    public function products(){
        return view("ass5/products");
    }
    public function createProduct(){
        return view("ass5/create-product");
    }
    public function productDetail(){
        return view("ass5/product-detail");
    }
    public function editProduct(){
        return view("ass5/edit-product");
    }

    public function deleteProduct(){
        return view("ass5/products");
    }

}
