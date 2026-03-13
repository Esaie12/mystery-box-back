<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;

    protected $table = "countries";

    protected $fillable = [
        'name',
        'drapeau',
        'code',
        'localisation',
        'devise',
        'delivery_delai',
        'transporteur',
        'delivery_price',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // relation vers occasions
    public function occasions()
    {
        return $this->belongsToMany(Occasion::class, 'occasion_country')->withPivot('date_activate')->withTimestamps();
    }
}
