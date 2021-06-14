<?php


namespace App\Services\Impl;


use App\Models\Transaction\Transaction;
use App\Services\TransactionService;

class TransactionServiceImpl implements TransactionService
{

    public function getAll()
    {
        $transactions = Transaction::with('transactionType', 'order')
            ->paginate(10);

        $transactions->map(function ($item) {
            if ($item->transactionType->ru_name) {
                $item->transaction_type = $item->transactionType->ru_name;
            }
            elseif ($item->transactionType->kk_name) {
                $item->transaction_type = $item->transactionType->kk_name;
            }
            else {
                $item->transaction_type = $item->transactionType->label;
            }
        });

        return $transactions;
    }
}
