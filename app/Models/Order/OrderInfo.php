<?php

namespace App\Models\Order;

use App\Models\Service\Services;
use App\Models\Specialist\Specialist;
use App\Models\Specialist\SpecialistStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderInfo extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'order_infos';

    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id');
    }

    public function service()
    {
        return $this->belongsTo(Services::class, 'service_id');
    }

    public function specialist()
    {
        return $this->belongsTo(Specialist::class, 'specialist_id')
            ->with('verificationStep');
    }

    public function specialistStatus()
    {
        return $this->belongsTo(SpecialistStatus::class, 'specialist_status_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id')->with('transaction');
    }
}
