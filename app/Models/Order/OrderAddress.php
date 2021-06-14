<?php

namespace App\Models\Order;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'order_addresses';

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
