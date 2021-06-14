<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Services\CityService;
use Illuminate\Http\Request;

class CityController extends WebBaseController
{
    protected $cityService;

    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    public function index()
    {
        $city = $this->cityService->getAll();

        return view('admin.city.cities', ['cities' => $city]);
    }

    public function create()
    {
        return view('admin.city.city-create');
    }

    public function store(Request $request)
    {
        $this->cityService->store($request);

        $this->added();

        return redirect()->route('cities');
    }

    public function edit($id)
    {
        $city = $this->cityService->get($id);

        return view('admin.city.city-edit', ['city' => $city]);
    }

    public function update(Request $request, $id)
    {
        $this->cityService->update($request, $id);

        $this->edited();

        return redirect()->route('cities');
    }
}
