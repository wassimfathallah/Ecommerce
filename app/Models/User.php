<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Providers\RouteServiceProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
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


    public function hasRole($role): bool
    {
        return  $this->getAttribute('role') === $role;
    }


    public function isAdmin(): bool
    {
        return  $this->hasRole('admin');
    }
    public function isEditor(): bool
    {
        return  $this->hasRole('editor');
    }
    public function isUser(): bool
    {
        return  $this->hasRole('user');
    }

    public function callMasterPage()
    {
        if ($this->isAdmin()) {
            return 'layouts.master_admin';
        } elseif ($this->isEditor()) {
 
            return 'layouts.master_editor';
        } else {
            return 'layouts.master';
        }
    }
    public function getRedirectRoute()
    {

        if ($this->isAdmin()) {
            return 'admin_dashboard';
        } elseif ($this->isEditor()) {

            return 'editor_dashboard';
        }
        return RouteServiceProvider::HOME;
    }
}
