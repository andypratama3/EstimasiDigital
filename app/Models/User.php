<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    public $table = 'users';

    public $fillable = [
        'name',
        'email',
        'email_verified_at',
        'is_active',
        'password',
        'remember_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
        'password' => 'string',
        'remember_token' => 'string',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    public static array $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|string|max:255',
        'email_verified_at' => 'nullable|datetime',
        'is_active' => 'nullable|boolean',
        'password' => 'nullable|string|min:8|max:255',
        'remember_token' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
    ];

    public function accessLogs(): HasMany
    {
        return $this->hasMany(\App\Models\AccessLog::class, 'user_id');
    }

    public function bukuDigitalsUpdated(): HasMany
    {
        return $this->hasMany(\App\Models\BukuDigital::class, 'updated_by');
    }

    public function jurnalDigitals(): HasMany
    {
        return $this->hasMany(\App\Models\JurnalDigital::class, 'created_by');
    }

    public function jurnalDigitalsUpdated(): HasMany
    {
        return $this->hasMany(\App\Models\JurnalDigital::class, 'updated_by');
    }

    public function klipingDigitals(): HasMany
    {
        return $this->hasMany(\App\Models\KlipingDigital::class, 'created_by');
    }

    public function klipingDigitalsUpdated(): HasMany
    {
        return $this->hasMany(\App\Models\KlipingDigital::class, 'updated_by');
    }

    public function modificationHistories(): HasMany
    {
        return $this->hasMany(\App\Models\ModificationHistory::class, 'modified_by');
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(\App\Models\Session::class, 'user_id');
    }
}
