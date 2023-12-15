<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extension extends Model
{
    use HasFactory, HasUlids;
    protected $table = 'extensions';
    protected $primaryKey = 'extension_ID';
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'pretrip_ID',
        'released_ID',
        'vehicle_type',
        'vehicle_plateNo',
        'extension_originalEndDateTime',
        'extension_extendedDateTime',
        'extension_cost'
    ];

    protected $guarded = [
        'extension_ID'
    ];
}
