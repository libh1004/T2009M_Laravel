<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function all(Request $request){
//        $brands = Brand::all();
//        $brands = Brand::with("Categories")->get();
        $brands = Brand::withCount("Categories")->paginate(10);

//        dd($brands);
        return view("admin.brand.list",[
            "brands"=>$brands
        ]);
    }
    public function form(){
        return view("admin.brand.form");
    }
    public function save(Request $request){
        $request->validate([
            "name"=>"required",
            "logo"=>"required",
        ],[
            "name.required"=>"Vui long nhap ten nhan hieu",
            "logo.required"=>"Vui long nhap logo",
        ]);
        try{
            $logo = "";
            if($request->hasFile("logo")){
                $file = $request->file("logo");
                $fileName = time().$file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
                $fileSize = $file->getSize();
                if($ext == "png" || $ext=="jpg" || $ext == "jpeg" || $ext=="gif"){
                    if($fileSize < 10000000){
                        $file->move("upload",$fileName);
                        $logo= "upload/".$fileName;
                    }
                }
            }
            Brand::create([
                "name" => $request->get("name"),
                "logo" => $logo,
                "color"=>$request->get("color"),
                "description"=>$request->get("description"),
            ]);
            return redirect()->to("admin/brands");
        }catch (\Exception $e){
            abort(404);
        }
    }
    public function edit($id){
        $brand = Brand::findOrFail($id);
        return view("admin.brand.edit-brand",[
            "brand"=>$brand,
        ]);
    }
    public function update(Request $request,$id){
        $brand = Brand::findOrFail($id);
        $request->validate([
            "name"=>"required",
            "logo"=>"required",
        ],[
            "name.required"=>"Vui long nhap ten hang",
            "logo.required"=>"Vui long nhap logo",
        ]);
        try{
            $logo = "";
            if($request->hasFile("logo")){
                $file = $request->file("logo");
                $fileName = time().$file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
                $fileSize = $file->getSize();
                if($ext == "png" || $ext=="jpg" || $ext == "jpeg" || $ext=="gif"){
                    if($fileSize < 10000000){
                        $file->move("upload",$fileName);
                        $logo= "upload/".$fileName;
                    }
                }
            }
            $brand->update([
               "name"=>$request->get("name"),
               "logo"=>$logo,
               "color"=>$request->get("color"),
               "description"=>$request->get("description"),
            ]);
            return redirect()->to("admin/brands");
        }catch (\Exception $e){
            abort(404);
        }
    }
    public function delete($id){
        $brand = Brand::findOrFail($id);
        try{
            $brand->delete();
            return redirect()->to("admin/brands");
        }catch (\Exception $e){
            abort(404);
        }
    }
}

