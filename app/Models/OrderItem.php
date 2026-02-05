<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = "order_items";

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
    ];

    /**
     * L’item appartient à une commande
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * L’item correspond à un produit
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
