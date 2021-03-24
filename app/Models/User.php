<?php

namespace App\Models;

use App\Notifications\PasswordReset;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'surname',
        'firstname',
        'phonenumber',
        'email',
        'password',
        'role_id',
        'google_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function is_basic() {
        return $this->role->id === 1; // 1 = "Utilisateur" dans la bdd
    }

    public function is_manager() {
        return $this->role->id === 2; // 2 = "Commerçant" dans la bdd
    }

    public function is_admin() {
        return $this->role->id === 3; // 3 = "Modérateur" dans la bdd
    }

    public function getFullnameAttribute() {
        return $this->firstname.' '.$this->surname;
    }

    public function stores() {
        return $this->hasMany(Store::class, 'manager_id');
    }

    public function favorites() {
        return $this->belongsToMany(Store::class, 'favorites');
    }

    public function ratings() {
        return $this->hasMany(Rating::class);
    }

    public function moderations() {
        return $this->hasMany(Moderation::class);
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordReset($token));
    }
}
