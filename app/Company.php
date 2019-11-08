<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    protected $table = 'companies'; 
    protected $guarded = [];

    public function services(){

        return $this->hasMany('App\Service');
    
    }

    public function albums(){

        return $this->hasMany('App\Album');
    
    }


    public function images(){

        return $this->hasMany('App\Image');
    
    }

    public function likes(){

        return $this->hasMany('App\Like');
    
    }

    public function user(){

        return $this->belongsTo('App\User');
    
    }

    public function entity(){

        return $this->belongsTo('App\Entity');
    
    }

    public function subscription(){

        return $this->belongsTo('App\Subscription');
    
    }
}
