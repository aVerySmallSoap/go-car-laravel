<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Extension extends Model
{
    use HasFactory, HasUlids;
    protected $table = 'extensions';
    protected $primaryKey = 'extension_ID';
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'pretrip_ID',
        'vehicle_type',
        'vehicle_plateNo',
        'extension_originalEndDateTime',
        'extension_extendedDateTime',
        'extension_cost',
        'extension_createdAt'
    ];

    protected $guarded = [
        'extension_ID'
    ];

    public function belongsToPreReceipt():BelongsTo{
        return $this->belongsTo(PreTripReceipt::class, 'pretrip_ID', 'pretrip_ID');
    }
}
