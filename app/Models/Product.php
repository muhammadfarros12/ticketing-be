<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Product extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'image',
        'criteria',
        'favorite',
        'status',
        'stock'
    ];

    function category() {
        return $this->belongsTo(Category::class);
    }
}
