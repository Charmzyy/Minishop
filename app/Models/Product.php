<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'product_name',
        'price',
        'quantity',
        'image_path',
        'type',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
