<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function user(){

        return $this->belongsTo('App\User');
    
    }

    public function companies(){

        return $this->belongsTo('App\Company');
    
    }
}
