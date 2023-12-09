<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PreTripReceipt extends Model
{
    use HasFactory;
    protected $table = 'pretripreceipts';
    protected $primaryKey = 'pretrip_ID';
    public $timestamps = false;

    protected $fillable = [
        'agent_name',
        'customer_name',
        'vehicle_type',
        'vehicle_plateNo',
        'pretrip_typeOfID',
        'pretrip_datestart',
        'pretrip_dateend',
        'pretrip_destination',
        'pretrip_initialGas',
        'pretrip_requestGasLiters',
        'pretrip_requestGasPrice',
        'pretrip_requestWash',
        'pretrip_requestHelmet',
        'pretrip_total',
        'pretrip_createdAt',
    ];

    protected $guarded = [
        'pretrip_ID'
    ];

    public function pretripReceipt(): BelongsTo{
        return $this->belongsTo(Customer::class, 'customer_name', 'customer_name');
    }
}
