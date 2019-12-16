<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin_profile extends Model
{
    public function admin()
	{
		return $this->belongsTo('App\Admin');
    }
}
