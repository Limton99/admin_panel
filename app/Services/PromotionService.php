<?php


namespace App\Services;



use Illuminate\Http\Request;

interface PromotionService
{
    public function getAll();
    public function get($id);
    public function store(Request $request);
    public function update(Request $request, $id);
    public function delete($id);
}
