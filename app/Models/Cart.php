<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $primaryKey = "cart_id";

    protected $fillable = [
        'card_id',
        'user_id',
        'code',
        'is_active'
    ];

    public function details()
    {
        return $this->hasMany(CartDetails::class, "cart_id", "cart_id");
    }
}
