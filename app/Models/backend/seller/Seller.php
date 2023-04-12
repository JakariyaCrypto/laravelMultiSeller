<?php

namespace App\Models\backend\seller;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Seller extends Authenticatable
{
    use HasFactory, Notifiable;
	protected $guard = 'sellers';
	protected $fillable = [
		'name','email','password','status','verification','photo',
		'address','address2','country','city','zip_code','mobile',
	];

}
