<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;


class Person extends Model
{
    use Searchable;

    public function searchableAs()
    {
        return 'people_index';
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        return $array;
    }

}
