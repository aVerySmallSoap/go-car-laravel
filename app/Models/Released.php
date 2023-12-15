<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Released extends Model
{
    use HasFactory;
    protected $table = 'released';
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'pretrip_ID',
        'vehicle_plateNo',
        'vehicle_model',
        'vehicle_type',
        'customer_name',
        'pretrip_dateend'
    ];
}
