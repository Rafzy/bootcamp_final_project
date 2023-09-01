<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name'
    ];

    public function items(){
        return $this->hasMany(Item::class);
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }
}
