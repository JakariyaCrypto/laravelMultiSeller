<?php

namespace App\Models\backend\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];


    // category by get all product  for fontpage
    public function products(){
    	return $this->hasMany('App\Models\backend\admin\Product','category_id','id')->where('status','active');
    }
}
