<?php

namespace App;

use App\Agence;
use App\Notifications\Comptable\ComptableResetPassword;
use App\Notifications\Comptable\ComptableVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Comptable extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'agence_id', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ComptableResetPassword($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new ComptableVerifyEmail);
    }

    public function agence()
	{
		return $this->belongsTo('App\Agence');
    }

    public function scopePublished($query)
	{
		return $query->where('status', 1);
    }

    public function paiements()
	{
		return $this->hasMany('App\Paiement');
    }

    public function profile()
	{
		return $this->hasOne('App\Comptable_profile');
    }
}
