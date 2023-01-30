<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
       'user_id',
       'total_price',
       'delivery'
    ];

    public function user(){
        return $this->BelongsTo(User::class);
    }
    public function products(){
     return $this->hasMany(Products::class);
    }
}
