<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryModel extends Model
{
    protected $table = 'country';

    public $fillable = ['name'];

    public function getCountryByName($name)
    {
        return self::where('name', 'like', $name)
            ->first();
    }
}
