<?php


namespace App\Services\Impl;


use App\Models\City;
use App\Services\CityService;
use Illuminate\Http\Request;

class CityServiceImpl implements CityService
{

    public function getAll()
    {
        return City::paginate(10);
    }

    public function get($id)
    {
        return City::findOrFail($id);
    }

    public function store(Request $request)
    {
        $city = new City();

        $city->fill($request->only([
            'iata_code',
            'ru_name',
            'en_name'
        ]));

        return $city->save();
    }

    public function update(Request $request, $id)
    {
        $city = City::findOrFail($id);

        $city->fill($request->only([
            'iata_code',
            'ru_name',
            'en_name'
        ]));

        return $city->save();
    }

    public function delete($id)
    {
        $city = City::findOrFail($id);

        return $city->delete();
    }
}
