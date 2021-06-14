<?php

namespace App\Http\Controllers;

use App\Services\VerificationCodeService;
use Illuminate\Http\Request;

class VerificationCodeController extends WebBaseController
{
    protected $service;

    public function __construct(VerificationCodeService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $verification_codes = $this->service->getAll();

        return view('admin.verification_code.verification_codes', ['verification_codes' => $verification_codes]);
    }
}
