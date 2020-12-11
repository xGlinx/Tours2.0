<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'name', 'url-photo', 'description', 'position', 'price', 'tour_id',
    ];

    public function tour(){

        return $this->belongTo('App\Tour');
    }

    public function reserve(){

        return $this->hasMany('App\Reserve');
    }
}
