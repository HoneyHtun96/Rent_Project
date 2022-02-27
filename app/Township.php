<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    protected $fillable = [
        'name'
    ];

    public function apartments()
    {
    	return $this->hasMany('App\Apartment');
    }
}
