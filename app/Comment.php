<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function user(){

        return $this->belongsTo('App\User');
    
    }

    public function company(){

        return $this->belongsTo('App\Company');
    
    }

    public function review(){

        return $this->belongsTo('App\Review');
    
    }

    public function makeRequest(){

        return $this->belongsTo('App\MakeRequest');
    
    }

    public function entity(){

        return $this->belongsTo('App\Entity');
    
    }

    public function likes(){

        return $this->hasMany('App\Like');
    
    }
}

