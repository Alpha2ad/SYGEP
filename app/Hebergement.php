<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Agence;
use App\Logement;

class Hebergement extends Model
{
    public function logements()
	{
		return $this->hasMany('App\Logement')->latest();
    }

    public function agence()
	{
		return $this->belongsTo('App\Agence');
    }

    public function scopeOperationdate($query)
	{
		return $query->where('date_operation', date('Y'));
    }
}
