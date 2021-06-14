<?php


namespace App\Http\Controllers\Service;


use App\Http\Controllers\WebBaseController;
use App\Services\UnitsService;
use Illuminate\Http\Request;

class UnitController extends WebBaseController
{
    protected $unitService;

    public function __construct(UnitsService $unitService)
    {
        $this->unitService = $unitService;
    }

    public function index()
    {
        $units = $this->unitService->getAllPaginate();

        return view('admin.unit.units', compact('units'));
    }

    public function create()
    {
        return view('admin.unit.unit-create');
    }

    public function store(Request $request)
    {
        $this->unitService->store($request);

        $this->added();

        return redirect()->route('units');
    }

    public function edit(Request $request, $id)
    {
        $unit = $this->unitService->get($id);

        return view('admin.unit.unit-edit', compact('unit'));
    }

    public function update(Request $request, $id)
    {
        $this->unitService->update($request, $id);

        $this->edited();

        return redirect()->route('units');
    }

    public function destroy($id)
    {
        $this->unitService->delete($id);

        $this->deleted();

        return redirect()->back();
    }
}
