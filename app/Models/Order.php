<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'reference',
        'recipient_name',
        'recipient_sex',
        'message',
        'anonymous',
        'phone',
        'address',
        'delivery_date',
        'delivery_instructions',
        'category_id',
        'amount',
        'status_id',
        'transaction_id'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
