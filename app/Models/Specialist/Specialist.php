<?php

namespace App\Models\Specialist;

use App\Models\Order\OrderInfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'specialists';

    public function verificationStep()
    {
        return $this->belongsTo(VerificationSteps::class, 'verification_step_id');
    }

    public function specialistInfo()
    {
        return $this->hasOne(SpecialistInfo::class, 'specialist_id');
    }

    public function orderInfo()
    {
        return $this->hasMany(OrderInfo::class, 'specialist_id')
            ->with('order')
            ->with('service');
    }

    public function wallets()
    {
        return $this->hasOne(SpecialistWallet::class, 'specialist_id');
    }

}
