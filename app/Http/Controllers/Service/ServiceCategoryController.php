<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WebBaseController;
use App\Services\ServiceAndCategoryService;
use Illuminate\Http\Request;

class ServiceCategoryController extends WebBaseController
{
    protected $service;

    public function __construct(ServiceAndCategoryService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $categories = $this->service->getAllCategoryPaginate();

        return view('admin.serviceAndCategory.categories', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('admin.serviceAndCategory.category-create');
    }

    public function store(Request $request)
    {
        $this->service->createCategory($request);

        $this->added();

        return redirect()->route('serviceCategories');
    }

    public function edit($id)
    {
        $category = $this->service->getCategory($id);

        return view('admin.serviceAndCategory.category-edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $category = $this->service->editCategory($request, $id);

        $this->edited();

        return redirect()->route('serviceCategories');
    }
}
