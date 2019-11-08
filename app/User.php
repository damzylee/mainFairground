<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    protected $guarded = [];

    public function companies(){

        return $this->hasMany('App\Company');
    
    }

    public function makeRequests(){

        return $this->hasMany('App\MakeRequest');
    
    }

    public function entity(){

        return $this->belongsTo('App\Entity');
    
    }

    public function services(){

        return $this->hasMany('App\Service');
    
    }

    public function reviews(){

        return $this->hasMany('App\Review');
    
    }

    public function likes(){

        return $this->hasMany('App\Like');
    
    }

    public function comments(){

        return $this->hasMany('App\Comment');
    
    }

    public function albums(){

        return $this->hasMany('App\Album');
    
    }

    public function images(){

        return $this->hasMany('App\Image');
    
    }

    public function subscription(){

        return $this->hasOne('App\Subscription');
    
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
