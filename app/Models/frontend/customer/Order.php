<?php

namespace App\Models\frontend\customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id','order_id','coupon_value','shipping_charge','sub_total','order_status','payment_method','payment_status'];
}
