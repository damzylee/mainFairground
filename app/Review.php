<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function user(){

        return $this->belongsTo('App\User');
    
    }


    public function service(){

        return $this->belongsTo('App\Service');
    
    }

    public function likes(){

        return $this->hasMany('App\Like');
    
    }

    public function comments(){

        return $this->hasMany('App\Comment');
    
    }

    public function entity(){

        return $this->belongsTo('App\Entity');
    
    }

}
