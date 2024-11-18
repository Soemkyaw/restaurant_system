<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function taxAmount()
    {
        $subTotal = $this->total_price;
        $taxRate = config('tax.rate');
        return $subTotal * $taxRate;
    }

    public function totalAmount()
    {
        return $this->total_price + $this->taxAmount();
    }
}
