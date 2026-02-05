<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'icon',
        'compatible'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    /**
     * Un produit peut être dans plusieurs commandes
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
