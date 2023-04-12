<?php

namespace App\Models\backend\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;
            
            protected $fillable = ['product_id','color','size','price','sell_price','photo','qty'];
}
