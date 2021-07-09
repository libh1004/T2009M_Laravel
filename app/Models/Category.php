<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
  use HasFactory;
  protected $table = "categories";
//  protected $primaryKey = "id"; // neu la cot id thi ko can khai bao
//    protected $keyType = "int"; // neu la int ko can khai bao
    protected $fillable = [
      "name",
        "brand_id",
    ];
//    public $timestamps = true; // mac dinh la true -> tu dong cap nhat thoi gian vao 2 cot created_at va updated_at

    public function Products(){
        return $this->hasMany(Product::class); // tra ve 1 collection cac Product object
    }
    public function Brand(){
        return $this->belongsTo(Brand::class);
    }
    public function scopeSearch($query,$search){
        if($search == "" || $search==null){
            return $query;
        }
        return $query->where("name","LIKE","%$search");
    }
    public function scopeBrand($query,$brandId){
        if($brandId == 0 || $brandId == null){
            return $query;
        }
        return $query->where("brand_id",$brandId);
    }
}
