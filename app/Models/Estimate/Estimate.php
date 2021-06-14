<?php

namespace App\Models\Estimate;

use App\Models\Transaction\PaymentMethod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'estimates';

    public function estimateStatus()
    {
        return $this->belongsTo(EstimateStatus::class, 'estimate_status_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }

}
