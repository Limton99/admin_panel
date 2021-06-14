<?php


namespace App\Models\Transaction;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'transaction_types';


}
