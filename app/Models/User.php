<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'permission_level',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'uuid',
        'token',
        'permission_level',
    ];

    public function event(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, Participants::class)
            ->withPivot([])
            ->withTimestamps()
            ->as('users_events');
    }
}
