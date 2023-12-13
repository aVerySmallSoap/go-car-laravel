<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserved extends Model
{
    use HasFactory;

    protected $table = 'reserved_vehicles';
    protected $primaryKey = 'reserved_id';
    public $timestamps = false;

    protected $fillable = [
        'vehicle_type',
        'vehicle_plateNo',
        'customer_name',
        'reserved_reservingPretripID',
        'reserved_reservationDate'
    ];
}
