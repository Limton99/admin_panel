<?php


namespace App\Services;


use Illuminate\Http\Request;

interface OrderService
{
    public function getAll(Request $request);
    public function get($id);
}
