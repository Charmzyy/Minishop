<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use HasFactory;



protected $fillable =[
	'name',
	'parent_id'
];

	public function Products(){

		return $this->hasMany(Products::class);
	}


	public function ParentCategory(){

		return $this->belongsTo(Category::class);
	}


}
