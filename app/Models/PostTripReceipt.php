<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTripReceipt extends Model
{
    use HasFactory;

    protected $table = 'posttripreceipts';
    protected $primaryKey = 'pretrip_ID';
    public $timestamps = false;

    protected $fillable = [
        'pretrip_ID',
        'agent_name',
        'customer_name',
        'posttrip_returnDate',
        'posttrip_gasBar',
        'posttrip_damageReport',
        'posttrip_optionalCost',
        'posttrip_total',
        'posttrip_createdAt'
    ];

    protected $guarded = [
        'posttrip_ID'
    ];
}
