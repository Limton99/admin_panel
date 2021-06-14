<?php

namespace App\Models\Promotion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'banners';
}
