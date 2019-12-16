<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phase extends Model
{
    public function bagages()
	{
		return $this->hasMany('App\Bagage');
    }

    public function convoits()
	{
		return $this->hasMany('App\Convoit');
    }

    public function scopeOperationdate($query)
	{
		return $query->where('date_operation', date('Y'));
    }

    public function scopeConfirmed($query)
	{
		return $query->where('status', 1);
    }
}
