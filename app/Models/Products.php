<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
	use HasFactory;


protected $fillable = [
	'category_id',
	'name',
	'description',
	'manufacturer',
	'price',
	'quantity',
	'type',
	'image_path'
];


	public function Cart(){

		return $this->hasMany(Cart::class);

	}

	public function Category(){

		return $this->belongsTo(Category::class);

	}
 
	public function reviews(){
		return $this->hasMany(Reviews::class);
	}
	public function ratings(){
		return $this->hasMany(Rating::class);
	}
}
