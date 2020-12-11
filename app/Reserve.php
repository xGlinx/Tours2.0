<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $fillable = [
        'user_id', 'tour_id', 'route_id', 'restaurant_id', 'lodging_id', 'date',
    ];

    public function user(){

        return $this->belongsTo('App\User');
    }

    public function tour(){

        return $this->belongsTo('App\Tour');
    }

    public function route(){

        return $this->belongsTo('App\Route');
    }

    public function restaurant(){

        return $this->belongsTo('App\Restaurant');
    }

    public function lodging(){

        return $this->belongsTo('App\Lodging');
    }
}
