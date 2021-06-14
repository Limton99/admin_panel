<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'users';

    public function city()
    {
        return $this->belongsTo('cities', 'city_id');
    }
}
