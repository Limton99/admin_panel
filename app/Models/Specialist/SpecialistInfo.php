<?php

namespace App\Models\Specialist;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialistInfo extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'specialist_infos';
}
