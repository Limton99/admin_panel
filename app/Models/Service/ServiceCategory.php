<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'service_categories';

    protected $fillable = [
        'name',
        'сommission',
        'visit_price',
        'visit_commision'
    ];

    public function service()
    {
        return $this->hasMany(Services::class, 'service_category_id');
    }
}
