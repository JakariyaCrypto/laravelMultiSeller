<?php

namespace App\Models\backend\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobileSMS extends Model
{
    use HasFactory;
    protected $fillable = ['number','code'];
}
