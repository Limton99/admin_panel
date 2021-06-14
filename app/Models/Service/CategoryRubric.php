<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryRubric extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'category_rubrics';

    public function category() {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id')
            ->with('service');
    }
}
