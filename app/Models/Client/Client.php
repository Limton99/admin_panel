<?php

namespace App\Models\Client;

use App\Models\City;
use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'users';

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id')
            ->with('info')
            ->with('addresses')
            ->with('transaction');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function wallets()
    {
        return $this->hasOne(ClientWallet::class, 'user_id');
    }
}
