<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;


class Service extends Model implements Searchable
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


    public function getSearchResult(): SearchResult
    {
        $url = route('services.show', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
         );
    }
}
