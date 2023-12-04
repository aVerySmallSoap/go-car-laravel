<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
    public $timestamps = false;

    protected $fillable = [
        'agent_name',
        'customer_name',
        'customer_age',
        'customer_civilStatus',
        'customer_contactNo',
        'customer_facebookURL'
    ];

    protected $guarded = [
        'customer_id'
    ];

    public function agent(): BelongsTo{
        return $this->belongsTo(Agent::class, 'agent_name', 'agent_name');
    }
}
