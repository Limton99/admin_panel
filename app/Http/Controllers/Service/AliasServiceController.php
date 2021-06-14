<?php


namespace App\Http\Controllers\Service;


use App\Http\Controllers\WebBaseController;
use App\Services\ServiceAndCategoryService;
use Illuminate\Http\Request;

class AliasServiceController extends WebBaseController
{
    protected $service;

    public function __construct(ServiceAndCategoryService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $alias = $this->service->getAllAlias();

        return view('admin.serviceAndCategory.aliases', compact('alias'));
    }

    public function show($id)
    {
        return $this->service->getAlias($id);;
    }

    public function create()
    {
        $services = $this->service->getAllService();

        return view('admin.serviceAndCategory.alias-create', compact('services'));
    }

    public function store(Request $request)
    {
        $this->service->createAlias($request);

        $this->added();

        return redirect()->route('aliases');
    }

    public function edit($id)
    {
        $alias = $this->show($id);
        $services = $this->service->getAllService();

        return view('admin.serviceAndCategory.alias-edit', [
            'alias' => $alias,
            'services' => $services
            ]);
    }

    public function update(Request $request, $id)
    {
        $this->service->editAlias($request, $id);
        $this->edited();

        return redirect()->route('aliases');
    }

    public function destroy($id)
    {
        $this->service->deleteAlias($id);

        $this->deleted();

        return redirect()->route('aliases');
    }
}
