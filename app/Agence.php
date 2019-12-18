<?php

namespace App;

use App\Notifications\Agence\AgenceResetPassword;
use App\Notifications\Agence\AgenceVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Hebergement;

class Agence extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
        $this->notify(new AgenceResetPassword($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new AgenceVerifyEmail);
    }

    public function tuteurs()
    {
        return $this->hasMany('App\Tuteur');
    }

    public function pelerins()
	{
		return $this->hasMany('App\pelerin');
    }
    public function bagages()
	{
		return $this->hasMany('App\Bagage');
    }
    public function logement()
	{
		return $this->hasMany('App\Logement');
    }

    public function agents()
	{
		return $this->hasMany('App\Agent');
    }
    public function acounts()
    {
        return $this->hasMany('App\Acount');
    }
    public function medecins()
    {
        return $this->hasMany('App\Medcin');
    }

    public function hebergements()
	{
		return $this->hasMany('App\Hebergement');
    }

    public function comptables()
	{
		return $this->hasMany('App\Comptable');
    }

    public function profile()
	{
		return $this->hasOne('App\Agence_profile');
    }
}
