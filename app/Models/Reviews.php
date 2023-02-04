<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $fillable = [
 'user_id',
 'parent_id',
 'products_id',
 'review',
 'likes'
    ];

    public function children(){
        return $this->hasMany(Reviews::class,'parent_id');
    }
    public function parent(){
        return $this->belongsTo(Reviews::class,'parent_id');
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
