<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AliasService extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'alias_services';

    public function service()
    {
        return $this->belongsTo(Services::class, 'service_id')->with('category');
    }
}
