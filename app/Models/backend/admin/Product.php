<?php

namespace App\Models\backend\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    // get product by relative product
    public function relativeProduct(){
    	return $this->hasMany('App\Models\backend\admin\Product','category_id','category_id')->where('status','active');
    }


    public static function getProduct($id){
    	return self::where('id',$id)->get()->toArray();
    }
}
