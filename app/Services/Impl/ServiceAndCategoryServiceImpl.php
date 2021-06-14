<?php


namespace App\Services\Impl;


use App\Models\Service\AliasService;
use App\Models\Service\CategoryRubric;
use App\Models\Service\ServiceCategory;
use App\Models\Service\Services;
use App\Services\ServiceAndCategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ServiceAndCategoryServiceImpl implements ServiceAndCategoryService
{

    public function createCategory(Request $request)
    {
        $category = new ServiceCategory();

        $category = $this->fillServiceCategory($category, $request);

        return $category->save();

    }

    public function editCategory(Request $request, $id)
    {
        $category = ServiceCategory::findOrFail($id);

        $category = $this->fillServiceCategory($category, $request);

        return$category->save();
    }

    public function getAllCategoryPaginate()
    {
        return ServiceCategory::paginate(10);
    }

    public function getAllCategory()
    {
        return ServiceCategory::all();
    }

    public function getCategory($id)
    {
        return ServiceCategory::findOrFail($id);
    }

    public function createService(Request $request)
    {
        $service = new Services();

        $service = $this->fillService($service, $request);

        return $service->save();
    }

    public function editService(Request $request, $id)
    {
        $service = Services::findOrFail($id);

        $service = $this->fillService($service, $request);

        return $service->save();
    }

    public function getAllServicePaginate()
    {
        $category_id = request()->category_id;

        $services = Services::with('category', 'unit');


        if ($category_id) {
            $services->whereHas('category', function ($q) use ($category_id) {
                $q->where('id', $category_id);
            });
        }

        $services = $services->paginate(5);

        $services->map(function ($item) {
            $item->unit_label =  $item->unit ? $item->unit->ru_name : null;
        });

        return $services;
    }

    public function getAllService()
    {
        return Services::all();
    }

    public function getService($id)
    {
        return Services::findOrFail($id);

    }

    public function fillService(Services $service, Request $request)
    {
        $service->fill($request->only([
            'name',
            'price',
            'description',
        ]));

        $service->service_category_id = $request->service_category_id;
        $service->unit_id = $request->unit_id;

        return $service;
    }

    public function fillServiceCategory(ServiceCategory $serviceCategory, Request $request)
    {
        $serviceCategory->fill($request->only([
            'name',
            'сommission',
            'visit_price',
            'visit_commision'
        ]));

        return $serviceCategory;
    }

    public function createAlias(Request $request)
    {
        $alias = new AliasService();

        $alias->name = $request->name;
        $alias->service_id = $request->service_id;

        return $alias->save();
    }

    public function editAlias(Request $request, $id)
    {
        $alias = $this->getAlias($id);

        $alias->name = $request->name;
        $alias->service_id = $request->service_id;

        return $alias->save();
    }

    public function getAllAlias()
    {
        return AliasService::with('service')->paginate(10);
    }

    public function getAlias($id)
    {
        return AliasService::with('service')->findOrFail($id);
    }

    public function deleteAlias($id)
    {
        $alias = AliasService::findOrFail($id);

        return $alias->delete();
    }

    public function createRubric(Request $request)
    {
        $rubric = new CategoryRubric();

        $rubric->name = $request->name;
        $rubric->service_category_id = $request->service_category_id;

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $file_name =  uniqid().'.'.File::extension($file->getClientOriginalName());
            $file_path = 'rubric/'.$file_name;
            $file_full_path = '/uploads/'.$file_path;

            Storage::disk('local')->put($file_path, File::get($file));

            $rubric->picture = $file_full_path;
        }

        return $rubric->save();
    }

    public function editRubric(Request $request, $id)
    {
        $rubric = $this->getRubric($id);

        $rubric->name = $request->name;
        $rubric->service_category_id = $request->service_category_id;

        if ($request->hasFile('picture')) {
            $oldFile = public_path().$rubric->picture;
            $file = $request->file('picture');
            $file_name =  uniqid().'.'.File::extension($file->getClientOriginalName());
            $file_path = 'rubric/'.$file_name;
            $file_full_path = '/uploads/'.$file_path;

            if(File::exists($oldFile)) {
                 File::delete($oldFile);
            }

            Storage::disk('local')->put($file_path, File::get($file));

            $rubric->picture = $file_full_path;
        }

        return $rubric->save();
    }

    public function getAllRubricPaginate()
    {
        return CategoryRubric::with('category')->paginate(10);
    }

    public function getRubric($id)
    {
        return CategoryRubric::with('category')->findOrFail($id);
    }

    public function deleteRubric($id)
    {
        $rubric = CategoryRubric::findOrFail($id);

        $rubric->delete();
    }
}
