<?php

namespace App\Models\Estimate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimateStatus extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'estimate_statuses';
}
