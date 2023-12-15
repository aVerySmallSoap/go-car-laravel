<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Released extends Model
{
    use HasFactory, HasUlids;
    protected $table = 'released';
    protected $primaryKey = 'released_ID';
    protected $keyType = 'char';
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
