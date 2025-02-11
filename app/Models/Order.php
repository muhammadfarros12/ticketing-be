<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'transaction_time',
        'total_price',
        'total_item',
        'payment_method',
        'cashier_id',
        'cashier_name',
        'payment_amount'
    ];

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

    public function cashier(){
        return $this->belongsTo(User::class, 'cashier_id');
    }
}
