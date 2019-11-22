<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;


class Sectors extends Model implements Searchable
{
    protected $guarded = [];

    public function companies(){

        return $this->hasMany('App\Company');
    
    }


    public function getSearchResult(): SearchResult
    {
        $url = route('sector.show', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
         );
    }
}
