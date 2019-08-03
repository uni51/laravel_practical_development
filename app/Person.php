<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Person extends Model
{
    protected $guarded = ['id'];

    public static $rules = [
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer',
    ];

    public function newCollection(array $models = [])
    {
        return new MyCollection($models);
    }

    public function getNameAndIdAttribute()
    {
        return $this->name . ' [id=' . $this->id . ']';
    }

    public function getNameAndMailAttribute()
    {
        return $this->name . ' (' . $this->mail . ')';
    }

    public function getNameAndAgeAttribute()
    {
        return $this->name . '(' . $this->age . ')';
    }

    public function getAllDataAttribute()
    {
        return $this->name . '(' . $this->age . ')' . ' [' . $this->mail . ']';
    }

    // 既存のプロパティを変更する
    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    // ミューテータ
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }

    // 配列でデータを保存する
    public function setAllDataAttribute(Array $value)
    {
        $this->attributes['name'] = $value[0];
        $this->attributes['mail'] = $value[1];
        $this->attributes['age'] = $value[2];
    }
}

class MyCollection extends Collection
{
    public function fields()
    {
        $item = $this->first();
        return array_keys($item->toArray());
    }
}
