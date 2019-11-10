<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function company(){

        return $this->belongsTo('App\Company');
    
    }

    public function user(){

        return $this->belongsTo('App\User');
    
    }

    public function makeRequests(){

        return $this->hasMany('App\MakeRequest');
        
    }

    public function reviews(){

        return $this->hasMany('App\Review'); 

    }
    
    public function entity(){

        return $this->belongsTo('App\Entity');
    
    }
}
