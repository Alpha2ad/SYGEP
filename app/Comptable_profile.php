<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comptable_profile extends Model
{
    public function comptable()
	{
		return $this->belongsTo('App\Comptable');
    }
}
