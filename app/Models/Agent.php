<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Agent extends Model
{
    use HasFactory;

    protected $table = 'agents';
    protected $primaryKey = 'agent_id';
    public $timestamps = false;

    protected $fillable = [
        'agent_name',
        'agent_age',
        'agent_address'
    ];

    public function customers():HasMany {
        return $this->hasMany(Customer::class, 'agent_name');
    }
}
