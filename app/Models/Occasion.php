<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Occasion extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'emoji',
        'description',
        'status',
        'date_start',
        'picture',
        'countries_code'
    ];

    protected $casts = [
        'countries_code' => 'array',
        'date_start' => 'date',
    ];

    // relation vers countries
    public function countries()
    {
        return $this->belongsToMany(Country::class, 'occasion_country')
                    ->withPivot('date_activate')
                    ->withTimestamps();
    }

}
