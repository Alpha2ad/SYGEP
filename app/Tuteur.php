<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pelerin;

class Tuteur extends Model
{
    public function agence()
    {
        return $this->belongsTo('App\Agence');
    }
    public function pelerins()
	{
		return $this->hasMany('App\Pelerin');
    }

    public function scopeOperationdate($query)
	{
		return $query->where('date_operation', date('Y'));
    }
}
