<?php


namespace App\Services\Impl;


use App\Models\Service\Unit;
use App\Services\UnitsService;
use Illuminate\Http\Request;

class UnitServiceImpl implements UnitsService
{

    public function getAll()
    {
        return Unit::all();
    }

    public function getAllPaginate()
    {
        $unit = Unit::paginate(10);

        $unit->map(function ($item) {
            $this->unitName($item);
        });

        return $unit;
    }

    public function get($id)
    {
        $item = Unit::findOrFail($id);
        $this->unitName($item);

        return $item;
    }

    public function store(Request $request)
    {
        $unit = new Unit();

        $unit->fill($request->only([
            'label',
            'ru_name',
            'kk_name'
        ]));

        return $unit->save();
    }

    public function update(Request $request, $id)
    {
        $unit = Unit::findOrFail($id);

        $unit->fill($request->only([
            'label',
            'ru_name',
            'kk_name'
        ]));

        return $unit->save();
    }

    public function delete($id)
    {
        $unit = $this->get($id);

        $unit->delete();
    }

    private function unitName($item) {
        if ($item->ru_name) {
            $item->name = $item->ru_name;
        }
        elseif ($item->kk_name) {
            $item->name = $item->kk_name;
        }
        else {
            $item->name = $item->label;
        }

        return $item;
    }
}
