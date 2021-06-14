<?php

namespace App\Models\Promotion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'promotions';

    protected $fillable = [
        'structure',
        'active',
        'from',
        'to'
    ];

    public function banner()
    {
        return $this->hasOne(Banner::class, 'promotion_id');
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($promotion) {
            $promotion->banner()->each(function($banner) {
                $banner->delete();
            });
        });
    }
}
