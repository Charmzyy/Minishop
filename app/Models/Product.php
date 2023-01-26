<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'sub_id',
        'name',
        'price',
        'likes'
    ];

    public function order_item(){
        return $this->hasOne(Order_items::class,'product_id');
    }

    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'id');
    }
}
