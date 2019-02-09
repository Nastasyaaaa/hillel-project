<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryModel extends Model
{
    protected $table = 'country';
    public $fillable = ['name'];
    public $timestamps = false;

    public function getCountryByName($name)
    {
        return self::where('name', 'like', $name)
            ->first();
    }
}
