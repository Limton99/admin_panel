<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WebBaseController;
use App\Models\Service\Unit;
use App\Services\ServiceAndCategoryService;
use Illuminate\Http\Request;

class ServiceController extends WebBaseController
{
    protected $service;

    public function __construct(ServiceAndCategoryService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $services = $this->service->getAllServicePaginate();
        $categories = $this->service->getAllCategory();
        $alias = $this->service->getAllAlias();

        return view('admin.serviceAndCategory.services', [
            'services' => $services,
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        $categories = $this->service->getAllCategory();
        $units = Unit::all();

        return view('admin.serviceAndCategory.service-create', [
            'categories' => $categories,
            'units' => $units
        ]);
    }

    public function store(Request $request)
    {
        $this->service->createService($request);

        $this->added();

        return redirect()->route('services');
    }

    public function edit($id)
    {
        $service = $this->service->getService($id);
        $categories = $this->service->getAllCategory();
        $units = Unit::all();

        return view('admin.serviceAndCategory.service-edit', [
            'service' => $service,
            'categories' => $categories,
            'units' => $units,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->service->editService($request, $id);

        $this->edited();

        return redirect()->route('services');
    }
}
