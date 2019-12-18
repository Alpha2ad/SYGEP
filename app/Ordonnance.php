<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
    public function agence()
    {
        return $this->belongsTo('App\Agence');
    }

    public function pelerin()
    {
        return $this->belongsTo('App\Pelerin');
    }

    public function scopeOperationdate($query)
	{
		return $query->where('date_operation', date('Y'));
    }
}
