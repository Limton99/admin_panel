<?php

namespace App\Http\Controllers\Specialist;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WebBaseController;
use App\Services\SpecialistService;
use Illuminate\Http\Request;

class SpecialistController extends WebBaseController
{
    protected $specialistService;

    public function __construct(SpecialistService $specialistService)
    {
        $this->specialistService = $specialistService;
    }

    public function index()
    {
        try {
            $specialists = $this->specialistService->getAll();

//        dd($specialists);
            return view('admin.specialist.specialists', ['specialists' => $specialists]);
        }catch (\Exception $e) {
            return view('admin.specialist.specialists', ['error' => $e]);
        }
    }

    public function show($id)
    {
        try {
            $specialist = $this->specialistService->get($id);
//dd($order);
            return view('admin.specialist.specialist', ['specialist' => $specialist]);
        }catch (\Exception $e) {
            return view('admin.specialist.specialist', ['error' => $e]);
        }
    }


    public function updateStatus($id, $status)
    {
        $this->specialistService->updateStatus($id, $status);
    }

    public function resetAttempts($id)
    {
        $this->specialistService->resetAttempts($id);

        $this->edited();

        return redirect()->back();
    }

    public function getTransactions($id)
    {
        $specialist = $this->specialistService->getTransactionsAndWallets($id);

        return view('admin.specialist.specialist-transactions', ['specialist' => $specialist]);
    }

}
