<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Order extends Model
{
    use HasFactory, HasApiTokens;
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
