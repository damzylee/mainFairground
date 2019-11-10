<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function user(){

        return $this->belongsTo('App\User');
    
    }

    public function company(){

        return $this->belongsTo('App\Company');
    
    }

    public function comment(){

        return $this->belongsTo('App\Comment');
    
    }

    public function review(){

        return $this->belongsTo('App\Review');
    
    }

    public function entity(){

        return $this->belongsTo('App\Entity');
    
    }
}
