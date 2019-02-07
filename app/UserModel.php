<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'user';

    public $fillable = ['firstname', 'lastname', 'adress_id'];

    public function adress()
    {
        return $this->belongsTo(AdressModel::class, 'adress_id', 'id');
    }

    public function setNewUser($firstname, $lastname, AdressModel $adress)
    {
        $user = new self();
        $user->setAttribute('firstname', $firstname);
        $user->setAttribute('lastname', $lastname);
        $user->setAttribute('adress_id', $adress->id);
        $user->save();
        return $user;
    }

    public function getUserByFirstAndLastName($firstname, $lastname)
    {
        return self::where('firstname', 'like', $firstname)
            ->where('lastname', 'like', $lastname)
            ->first();
    }

    public function isNameUnique($firstname, $lastname)
    {
        $res = $this->getUserByFirstAndLastName($firstname, $lastname);
        return empty($res) ? true : false;
    }
}
