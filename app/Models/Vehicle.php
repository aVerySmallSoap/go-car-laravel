<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicles';
    protected $primaryKey = 'car_plateNo';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'vehicle_plateNo',
        'vehicle_name',
        'vehicle_color',
        'vehicle_type'
    ];

    public function leaser(): BelongsTo{
        return $this->belongsTo(Leaser::class, 'leaser_name', 'leaser_name');
    }

}
