<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Console\Migrations\ResetCommand;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function all(Request $request){
        $brandId = $request->get("brand_id");
        $search = $request->get("search");
        $categories = Category::withCount("Products")->get();
        $categories = Category::with("Brand")->search($search)->brand($brandId)->orderBy("id","desc")->paginate(20);

//        dd($categories); // $category->Product -> 1 array (collection) Product object
        $brands = Brand::all();
        return view("admin.category.list",[
            "categories"=>$categories,
            "brands"=>$brands,
        ]);
    }
    public function categoriesBrand($id){
        $brands = Brand::all();
        $categories = Category::where("brand_id",$id)->get();
        return view("admin.category.list",[
            "categories"=>$categories,
            "brands" => $brands
        ]);
    }
    public function form(){
        $brands = Brand::all();
        return view("admin.category.form",[
            "brands"=>$brands,
        ]);
    }
    public function save(Request $request){
        $request->validate([
            "name"=>"required",
            "brand_id"=>"required",
        ],[
            "name.required" => "Vui long nhap ten loai",
            "brand_id.required"=>"Vui long nhap brand_id",
        ]);

        try{
            Category::create([
                "name"=>$request->get("name"),
                "brand_id"=>$request->get("brand_id"),
            ]);
            return redirect()->to("admin/categories");
        }catch (\Exception $e){
            abort(404);
        }
    }
    public function edit($id){
        $brands = Brand::all();
        $category = Category::findOrFail($id);
        return view("admin.category.edit-category",[
            "category"=>$category,
            "brands"=>$brands,
        ]);
    }
    public function update(Request $request,$id){
        $category=Category::findOrFail($id);
        $request->validate([
            "name"=>"required",
            "brand_id"=>"required",
        ],[
            "name.required"=>"Vui long nhap ten san pham",
            "brand_id.required"=>"Vui long nhap brand_id",
        ]);

        try{
            $category->update([
                "name"=>$request->get("name"),
                "brand_id"=>$request->get("brand_id"),
            ]);
            return redirect()->to("admin/categories");
        }catch (\Exception $e){
            abort(404);
        }
    }

    public function delete($id){
        $category=Category::findOrFail($id);
        try{
            $category->delete();
            return redirect()->to("admin/categories");
        }catch (\Exception $e){
            abort(404);
        }
    }
}
