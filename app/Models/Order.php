<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	use HasFactory;

protected $fillable =[
'user_id',
'total_price'
];


	public function Cart(){

		return $this->hasMany(Cart::class);
	}

	public function Customer(){

		return $this->belongsTo(User::class);
	}

public function orderproducts(){
	return $this->hasMany(OrderProduct::class);
}


}
