<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\User;
use App\Models\Pizza;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class, 'carts');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
