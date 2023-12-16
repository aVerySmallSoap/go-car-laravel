<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model{
    use HasFactory, HasUlids;

    protected $table = 'receipts';
    protected $primaryKey = 'receipt_ID';
    public $timestamps = false;

    protected $fillable = [
        'pretrip_ID',
        'posttrip_ID',
        'pretrip_initialGas',
        'pretrip_requestGasLiters',
        'pretrip_requestGasPrice',
        'pretrip_requestWash',
        'pretrip_requestHelmet',
        'posttrip_gasBar',
        'posttrip_optionalCost',
        'customer_name',
        'agent_name',
        'pretrip_destination',
        'vehicle_type',
        'vehicle_plateNo',
        'pretrip_dateend',
        'posttrip_returnDate',
        'receipt_hourDeficit',
        'receipt_hourCostDeficit',
        'receipt_total',
        'receipt_createdAt'
    ];

    protected $guarded = [
        'receipt_ID'
    ];
}
