<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = "order_id";

    protected $fillable = [
        'order_id',
        'cart_id',
        'code'
    ];

    public function details(){
        return $this->hasMany(OrderDetails::class,"order_id","order_id");
    }
}
