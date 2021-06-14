<?php


namespace App\Services\Impl;


use App\Models\VerificationCode;
use App\Services\VerificationCodeService;

class VerificationCodeServiceImpl implements VerificationCodeService
{

    public function getAll()
    {
        return VerificationCode::paginate(10);
    }
}
