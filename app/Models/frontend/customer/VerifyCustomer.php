<?php

namespace App\Models\frontend\customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class VerifyCustomer extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id','token'];

    public function user(){
    	return $this->belongsTo(User::class,'customer_id');
    }
}
