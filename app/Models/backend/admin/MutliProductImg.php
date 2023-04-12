<?php

namespace App\Models\backend\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MutliProductImg extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','file','user_id'];
}
