<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_items extends Model
{
    use HasFactory;

    protected $fillable =[
          'product_id',
          'product_name',
          'quantity',
          'price'
    ];

    public function product(){
        return $this->hasOne(Product::class,'id');
    }

    public function order(){
        return $this->belongsTo(Order::class,'id');
    }
}
