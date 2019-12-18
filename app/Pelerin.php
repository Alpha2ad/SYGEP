<?php

namespace App;

use App\Paiement;
use App\Agent;
use App\Bagage;
use App\Tuteur;
use Illuminate\Database\Eloquent\Model;

class Pelerin extends Model
{
    public function agence()
	{
		return $this->belongsTo('App\Agence');
    }

    public function tuteur()
	{
		return $this->belongsTo('App\Tuteur');
    }

    public function ordonnances()
    {
        return $this->hasMany('App\Ordonnance');
    }

    public function agent()
	{
		return $this->belongsTo('App\Agent');
    }

    public function scopePublished($query)
	{
		return $query->where('status', 1);
    }

    public function scopeOperationdate($query)
	{
		return $query->where('date_operation', date('Y'));
    }

    public function paiements()
	{
		return $this->hasMany('App\Paiement');
    }

    public function bagages()
	{
		return $this->hasMany('App\Bagage');
    }
    public function logements()
	{
		return $this->belongsToMany('App\Logement')->withTimestamps();
	}
    public function acount()
	{
		return $this->hasOne('App\Acount');
    }
}
