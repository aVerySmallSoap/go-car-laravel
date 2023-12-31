<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PreTripReceipt extends Model
{
    use HasFactory;
    protected $table = 'pretripreceipts';
    protected $primaryKey = 'pretrip_ID';
    public $timestamps = false;

    protected $fillable = [
        'pretrip_ID',
        'agent_name',
        'customer_name',
        'vehicle_type',
        'vehicle_plateNo',
        'pretrip_typeOfID',
        'pretrip_datestart',
        'pretrip_dateend',
        'pretrip_destination',
        'pretrip_destinationPrice',
        'pretrip_initialGas',
        'pretrip_requestGasLiters',
        'pretrip_requestGasPrice',
        'pretrip_requestWash',
        'pretrip_requestHelmet',
        'pretrip_total',
        'pretrip_createdAt',
    ];

    public function pretripReceipt(): BelongsTo{
        return $this->belongsTo(Customer::class, 'customer_name', 'customer_name');
    }

    public function timeExtension():hasMany {
        return $this->hasMany(Extension::class, 'pretrip_ID', 'pretrip_ID');
    }
}
