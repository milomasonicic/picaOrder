<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Pizza;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pizza extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function orders() {
        return $this->belongsToMany(Order::class, 'carts');
    }
}
