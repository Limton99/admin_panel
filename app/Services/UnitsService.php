<?php


namespace App\Services;


use App\Models\Service\Unit;
use Illuminate\Http\Request;

interface UnitsService
{
    public function getAll();
    public function getAllPaginate();
    public function get($id);
    public function store(Request $request);
    public function update(Request $request, $id);
    public function delete($id);
}
