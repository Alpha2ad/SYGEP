<?php

namespace App;

use App\Pelerin;
use App\Comptable;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    public function pelerin()
	{
		return $this->belongsTo('App\Pelerin');
    }

    public function agent()
	{
		return $this->belongsTo('App\Agent');
    }

    public function comptable()
	{
		return $this->belongsTo('App\Comptable');
    }

    public function acount()
	{
		return $this->belongsTo('App\Acount');
    }

    public function scopeConfirmed($query)
	{
		return $query->where('status', 1);
    }

    public function scopeOperationdate($query)
	{
		return $query->where('date_operation', date('Y'));
    }

}
