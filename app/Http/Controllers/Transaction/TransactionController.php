<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WebBaseController;
use App\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends WebBaseController
{
    protected $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function index()
    {
        $transactions = $this->transactionService->getAll();

        return view('admin.transaction.transactions', ['transactions' => $transactions]);
    }
}
