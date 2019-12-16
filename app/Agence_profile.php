<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agence_profile extends Model
{
    public function agence()
	{
		return $this->belongsTo('App\Agence');
    }
}
