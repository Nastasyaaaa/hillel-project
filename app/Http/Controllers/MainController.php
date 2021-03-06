<?php

namespace App\Http\Controllers;

use App\AdressModel;
use App\CityModel;
use App\CountryModel;
use App\Http\Requests\UserRequest;
use App\StreetModel;
use App\UserModel;


class MainController extends Controller
{
    public function get($firstname, $lastname, UserModel $userModel)
    {
        $user = $userModel->getUserByFirstAndLastName($firstname, $lastname);

        if (empty($user)) {
            return response()->json('User firstname lastname doesn\'t exist.', 204);
        } else {
            $arr = [
                'firstname' => $user->firstname,
                'lastname' => $user->lastname,
                'country' => $user->adress->country->name,
                'city' => $user->adress->city->name,
                'street' => $user->adress->street->name
            ];
            return response()->json($arr, 200);
        }
    }

    public function add(UserRequest $request, UserModel $userModel, AdressModel $adressModel, CountryModel $countryModel, CityModel $cityModel, StreetModel $streetModel)
    {
        $firstname = $request->post('firstname');
        $lastname = $request->post('lastname');

        $user = $userModel->getUserByFirstAndLastName($firstname, $lastname);

        if (empty($user)) {
            $country = $countryModel->getCountryByName($request->post('country'));
            $city = $cityModel->getCityByName($request->post('city'));
            $street = $streetModel->getStreetByName($request->post('street'));

            if (empty($country) || empty($city) || empty($street))
                return response()->json('Adress country city street doesn\'t exist.', 406);

            $adress = $adressModel->getAdress($country->id, $city->id, $street->id);

            if (empty($adress))
                return response()->json('Adress country city street doesn\'t exist.', 406);

            $user = $userModel->setNewUser($firstname, $lastname, $adress);
            return response()->json("User $user->firstname $user->lastname created.", 201);
        } else {
            return response()->json('User firstname lastname already exist.', 204);
        }
    }
}
