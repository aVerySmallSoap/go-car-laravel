<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';
    protected $primaryKey = 'car_plateNo';
    public $timestamps = false;

    protected $fillable = [
        'car_name',
        'car_type',
        'car_color',
        'car_isAvailable'
    ];

    public function leaser(): BelongsTo{
        return $this->belongsTo(Leaser::class, 'leaser_name', 'leaser_name');
    }
}
