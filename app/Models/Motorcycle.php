<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Motorcycle extends Model
{
    use HasFactory;

    protected $table = 'motorcycles';
    protected $primaryKey = 'motor_plateNo';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'motor_plateNo',
        'motor_name',
        'motor_type',
        'motor_color',
        'motor_isAvailable',
        'leaser_name'
    ];

    public function leaser(): BelongsTo{
        return $this->belongsTo(Leaser::class, 'leaser_name', 'leaser_name');
    }
}
