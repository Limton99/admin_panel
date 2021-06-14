<?php


namespace App\Services;


interface SpecialistService
{
    public function getAll();
    public function get($id);
    public function updateStatus($id, $status);
    public function resetAttempts($id);
    public function getTransactionsAndWallets($id);
}
