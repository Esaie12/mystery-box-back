<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'mystery',
        'icon',
        'color',
        'price',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
