<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'user_id',
		'township_id',
		'type_id',
		'floor_id',
		'price',
		'image',
		'description',
        'lat',
        'lng'
    ];

    public function township()
    {
    	return $this->belongsTo('App\Township');
    }
    public function floor()
    {
    	return $this->belongsTo('App\Floor');
    }
    public function type()
    {
    	return $this->belongsTo('App\Type');
    }
    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }
}
