<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'units';

    protected $fillable = [
        'label',
        'ru_name',
        'kk_name'
    ];

    public $timestamps = false;
}
