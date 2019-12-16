<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convoit extends Model
{
    public function phase()
	{
		return $this->belongsTo('App\Phase');
    }

    public function scopeOperationdate($query)
	{
		return $query->where('date_operation', date('Y'));
    }
}
