<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'cities';

    protected $fillable = [
        'iata_code',
        'ru_name',
        'en_name'
    ];
}
