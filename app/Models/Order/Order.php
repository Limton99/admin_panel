<?php

namespace App\Models\Order;

use App\Models\Client;
use App\Models\Estimate\Estimate;
use App\Models\Transaction\Transaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'orders';

    public function client()
    {
        return $this->belongsTo(Client::class, 'user_id');
    }

    public function addresses()
    {
        return $this->hasOne(OrderAddress::class, 'order_id')
            ->with('city');
    }

    public function info()
    {
        return $this->hasOne(OrderInfo::class, 'order_id')
            ->with('status')
            ->with('service')
            ->with('specialist');
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'order_id')
            ->with('paymentMethod');
    }

    public function estimates()
    {
        return $this->hasMany(Estimate::class, 'order_id')
            ->with('paymentMethod')
            ->with('estimateStatus');
    }
}
