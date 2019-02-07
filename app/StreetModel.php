<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StreetModel extends Model
{
    protected $table = 'street';

    public $fillable = ['name'];

    public function getStreetByName($name)
    {
        return self::where('name', 'like', $name)
            ->first();
    }
}
