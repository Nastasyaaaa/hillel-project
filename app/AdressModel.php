<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdressModel extends Model
{
    protected $table = 'adress';

    public $fillable = ['country_id', 'city_id', 'street_id'];

    public function country()
    {
        return $this->belongsTo(CountryModel::class, 'country_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(CityModel::class, 'city_id', 'id');
    }

    public function street()
    {
        return $this->belongsTo(StreetModel::class, 'street_id', 'id');
    }

    public function getAdress($countryId, $cityId, $streetId)
    {
        return self::where('country_id', '=', $countryId)
            ->where('city_id', '=', $cityId)
            ->where('street_id', '=', $streetId)
            ->first();
    }

    public function isAdressExist($countryId, $cityId, $streetId)
    {
        $res = $this->getAdress($countryId, $cityId, $streetId);
        return empty($res) ? false : true;
    }
}
