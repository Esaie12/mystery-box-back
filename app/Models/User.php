<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Order;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, TwoFactorAuthenticatable;

    // Champs modifiables
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
        'affiliate_code',
        'country',
        'two_factor_secret',
        'two_factor_recovery_codes',
    ];

    // Champs masqués dans les réponses JSON
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes',
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

    /**
     * Obtenir l'email pour la vérification
     */
    public function getEmailForVerification()
    {
        return $this->email;
    }

    /**
     * Marquer l'email comme vérifié
     */
    public function markEmailAsVerified()
    {
        return $this->forceFill([
            'email_verified_at' => $this->freshTimestamp(),
        ])->save();
    }

    /**
     * Vérifier si l'email est confirmé
     */
    public function hasVerifiedEmail()
    {
        return !is_null($this->email_verified_at);
    }

    /**
     * Obtenir l'URL de la photo de profil
     */
    public function getProfilePhotoUrlAttribute()
    {
        return sprintf('https://ui-avatars.com/api/?name=%s&color=14b8a6&background=f0fdfa', urlencode($this->name));
    }
}
