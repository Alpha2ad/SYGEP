<?php

namespace App;

use App\Pelerin;
use Illuminate\Database\Eloquent\Model;

class Bagage extends Model
{
    public function phase()
	{
		return $this->belongsTo('App\Phase');
    }
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
