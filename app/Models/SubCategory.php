<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'cat_id',
        'name'

    ];

    public function category(){
        return $this->belongsTo(Category::class,'id');  
        // im not sure about this model relation
    }
    public function products(){
        return $this->hasMany(Product::class,'sub_id');
    }
}
