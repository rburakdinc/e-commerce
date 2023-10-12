<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $primaryKey = "invoice_id";

    protected $fillable = [
        'invoice_id',
        'order_id',
        'code'
    ];

    public function details()
    {
        return $this->hasMany(InvoiceDetails::class, "invoice_id", "invoice_id");
    }
}
