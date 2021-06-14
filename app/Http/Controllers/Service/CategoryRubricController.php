<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\WebBaseController;
use App\Services\ServiceAndCategoryService;
use Illuminate\Http\Request;

class CategoryRubricController extends WebBaseController
{
    protected $service;

    public function __construct(ServiceAndCategoryService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $rubrics = $this->service->getAllRubricPaginate();

        return view('admin.serviceAndCategory.rubrics', compact('rubrics'));
    }

    public function show($id)
    {
        return $this->service->getRubric($id);;
    }

    public function create()
    {
        $categories = $this->service->getAllCategory();

        return view('admin.serviceAndCategory.rubric-create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->service->createRubric($request);

        $this->added();

        return redirect()->route('rubrics');
    }

    public function edit($id)
    {
        $rubric = $this->show($id);
        $categories = $this->service->getAllCategory();

        return view('admin.serviceAndCategory.rubric-edit', [
            'rubric' => $rubric,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->service->editRubric($request, $id);
        $this->edited();

        return redirect()->route('rubrics');
    }

    public function destroy($id)
    {
        $this->service->deleteRubric($id);

        $this->deleted();

        return redirect()->route('rubrics');
    }
}
