<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table  = "brands";
    protected $fillable =[
        "name",
        "logo",
        "color",
        "description",
    ];

    public function Categories(){
        return $this->hasMany(Category::class);
    }
    public function getLogo(){
        if($this->logo){
            return asset($this->logo);
        }
        return "";
    }
}
