<?php


namespace App\Services\Impl;


use App\Models\Specialist\Specialist;
use App\Models\Specialist\VerificationSteps;
use App\Services\SpecialistService;

class SpecialistServiceImpl implements SpecialistService
{

    public function getAll()
    {
        $specialists = Specialist::with('specialistInfo', 'verificationStep')
            ->paginate(10);

        $specialists->map(function ($data) {
            $data->profile = $data->profile_created == 1 ? 'Да' : 'Нет';
            if ($data->verificationStep->ru_name) {
                $data->verificationStep->name = $data->verificationStep->ru_name;
            }
            elseif ($data->verificationStep->en_name) {
                $data->verificationStep->name = $data->verificationStep->kk_name;
            }
            else {
                $data->verificationStep->name = $data->verificationStep->label;
            }
        });

        return $specialists;
    }

    public function get($id)
    {
        $specialist = Specialist::with('specialistInfo', 'verificationStep')
            ->find($id);

        $orderInfo = $specialist->orderInfo()->paginate(5);

        if (!$specialist) {
            throw new \Exception('Такого специалиста нету!!!');
        }

        $orderInfo->map(function ($item) {
            if ($item->status->ru_name) {
                $item->status->name = $item->status->ru_name;
            }
            elseif ($item->status->en_name) {
                $item->status->name = $item->status->kk_name;
            }
            else {
                $item->status->name = $item->status->label;
            }
        });

        $verificationSteps = VerificationSteps::all();

        $verificationSteps->map(function ($item) {
            if ($item->ru_name) {
                $item->name = $item->ru_name;
            }
            elseif ($item->en_name) {
                $item->name = $item->kk_name;
            }
            else {
                $item->name = $item->label;
            }
        });

        if ($specialist->verificationStep->ru_name) {
            $specialist->verificationStep->name = $specialist->verificationStep->ru_name;
        }
        elseif ($specialist->verificationStep->en_name) {
            $specialist->verificationStep->name = $specialist->verificationStep->kk_name;
        }
        else {
            $specialist->verificationStep->name = $specialist->verificationStep->label;
        }


        return [
            'specialist'        => $specialist,
            'orderInfo'         => $orderInfo,
            'verificationSteps' => $verificationSteps
        ];
    }


    public function updateStatus($id, $status) {
        $specialist = $this->get($id)['specialist'];

        $specialist->verification_step_id = $status;

        $specialist->save();
    }

    public function resetAttempts($id)
    {
        $specialist = $this->get($id)['specialist'];

        $specialist->auth_attempts = 0;

        $specialist->save();
    }

    public function getTransactionsAndWallets($id)
    {
        $specialist = Specialist::with('wallets')->findOrFail($id);

        $transactions = $specialist->orderInfo()->paginate(5);

//        dd($transactions);

        return [
            'specialist'   => $specialist,
            'transactions' => $transactions
        ];
    }
}
