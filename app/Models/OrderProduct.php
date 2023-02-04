<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    protected $fillable =[
'user_id',
'order_id',
'product_id',
'quantity'

    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }
    
}
