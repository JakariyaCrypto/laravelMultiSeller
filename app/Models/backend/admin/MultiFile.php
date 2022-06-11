<?php

namespace App\Models\backend\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiFile extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','folder_id','file'];
}
