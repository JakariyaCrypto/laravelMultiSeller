<?php

namespace App\Models\backend\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = ['type','value','code','status'];


    public function discount($total){
    	if ($this->type == 'fixed') {
    		return $this->value;
    	}elseif ($this->type == 'percent') {
    		return(($this->value/100)*$total);
    	}else{
    		return 0;
    	}
    }
}
