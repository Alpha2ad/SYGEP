<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent_profile extends Model
{
    public function agent()
	{
		return $this->belongsTo('App\Agent');
    }
}
