<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $table = 'agents';
    protected $primaryKey = 'agent_id';

    protected $fillable = [
        'agent_name',
        'agent_age',
        'agent_address'
    ];
}
