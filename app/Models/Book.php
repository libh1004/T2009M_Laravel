<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = "books";
    protected $primaryKey = "book_id";
    protected $fillable = [
        "author_id",
        "title",
        "isbn",
        "pub_year",
        "available",
    ];

    public function scopeSearch($query,$search){
        if($search == "" || $search == null){
            return $query;
        }else{
            return $query->where("title","LIKE","%$search%");
        }
    }
}
