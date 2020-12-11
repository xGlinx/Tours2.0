<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = [
        'url-front', 'front-title', 'url-photo', 'description', 'name', 'duration', 'price', 'price-travel'
    ];

    public function route(){

        return $this->hasMany('App\Route');
    }

    public function restaurant(){

        return $this->hasMany('App\Restaurant');
    }

    public function lodging(){

        return $this->hasMany('App\Lodging');
    }

    public function reserve(){

        return $this->hasMany('App\Reserve');
    }
}
