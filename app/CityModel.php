<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{
    protected $table = 'city';

    public $fillable = ['name'];

    public function getCityByName($name)
    {
        return self::where('name', 'like',$name)
            ->first();
    }
}
