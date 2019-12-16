<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Hebergement;
class Logement extends Model
{
    public function hebergement()
	{
		return $this->belongsTo('App\Hebergement');
    }
    public function agence()
	{
		return $this->belongsTo('App\Agence');
    }

    public function pelerins()
	{
		return $this->belongsToMany('App\Pelerin')->withTimestamps();
	}

    public function scopeOperationdate($query)
	{
		return $query->where('date_operation', date('Y'));
    }
}
