<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\RoleEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'birthdate',
        'email',
        'password',
        'phone_number',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'role'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function crafter() : HasOne {
        return $this->hasOne(Crafter::class);
    }
    public function addresses(): HasMany{
        return $this->hasMany(Address::class);
    }
    public function products(): HasMany {
        return $this->hasMany(Product::class);
    }
    public function orders():HasMany {
        return $this->hasMany(Order::class);
    }
    public function images(): MorphMany{
        return $this->morphMany(Image::class, 'imagable');
    }

    // * roles
    public function isAdmin(): bool {
        return $this->role === RoleEnum::ADMIN;
    }
    public function isCrafter(): bool {
        return $this->role === RoleEnum::CRAFTER;
    }
    public function isUser(): bool {
        return $this->role === RoleEnum::USER;
    }
}
