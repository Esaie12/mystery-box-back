<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes; // Pour le soft delete
use App\Models\Order;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes; // Ajout de SoftDeletes

    // Champs modifiables
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Champs masqués dans les réponses JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Casting des champs
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relation avec les commandes (Order)
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
