<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = "status";
    protected $fillable = ['title', 'emoji', 'message'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
