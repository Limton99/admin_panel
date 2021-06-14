<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'services';

    protected $fillable = [
      'name',
      'price',
      'description',
    ];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function alias()
    {
        return $this->hasOne(AliasService::class, 'service_id');
    }
}
