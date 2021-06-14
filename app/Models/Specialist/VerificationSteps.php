<?php

namespace App\Models\Specialist;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationSteps extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'verification_steps';
}
