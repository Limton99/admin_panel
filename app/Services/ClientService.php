<?php


namespace App\Services;


use Illuminate\Http\Request;

interface ClientService
{
    public function getAll();
    public function get($id);
    public function store(Request $request);
    public function update(Request $request, $id);
    public function delete($id);
    public function resetAttempts($id);
    public function getTransactionsAndWallets($id);
}
