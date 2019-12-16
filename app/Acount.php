<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acount extends Model
{
    public function pelerin()
	{
		return $this->belongsTo('App\Pelerin');
    }
    public function agence()
    {
        return $this->belongsTo('App\Agence');
    }

    public function scopePublished($query)
	{
		return $query->where('status', 1);
    }

    public function scopeValideted($query)
	{
		return $query->where('valide', 1);
    }

    public function paiements()
	{
		return $this->hasMany('App\Paiement');
    }
}
