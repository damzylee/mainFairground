<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;


class Company extends Model implements Searchable
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

    public function sector(){

        return $this->belongsTo('App\Sectors');
    
    }

    public function entity(){

        return $this->belongsTo('App\Entity');
    
    }

    public function subscription(){

        return $this->belongsTo('App\Subscription');
    
    }


    public function getSearchResult(): SearchResult
    {
        $url = route('company.show', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
         );
    }

}
