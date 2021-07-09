<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function PHPUnit\Framework\isEmpty;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = [
        "name",
        "price",
        "qty",
        "category_id",
        "description",
    ];

    public function Category(){
//        return $this->belongsTo(Category::class,"category_id","id");
        return $this->belongsTo(Category::class); // phai khoa ngoai la category_id va khoa chinh ben category la id
//        return $this->belongTo(Model::class

    }

    public function scopeSearch($query,$search){
        if($search == "" || $search == null){
            return $query;
        }
        return $query->where("name","LIKE","%$search%");
    }

    public function scopeCategory($query,$categoryId){
        if($categoryId==0 || $categoryId==null){
            return $query;
        }
        return $query->where("category_id",$categoryId);
    }
    public function scopeFormPrice($query,$price){

    }

    public function scopeToPrice($query,$price){

    }
}
