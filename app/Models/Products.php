<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
	use HasFactory;



        protected $table = "products";

	public function Cart(){

		return $this->hasMany(Cart::class);

	}

	public function Category(){

		return $this->belongsTo(Category::class);

	}

}
