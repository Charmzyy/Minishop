<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	use HasFactory;





	public function Order(){
	 
		 return $this->belongsTo(Order::class);
	
	}

	public function Products(){
	

		return $this->belongsTo(Products::class);
	}
}
