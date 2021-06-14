<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientWallet extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'user_wallets';
}
