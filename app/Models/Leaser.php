<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaser extends Model
{
    use HasFactory;

    protected $table = 'leasers';
    protected $primaryKey = 'leaser_id';
    public $timestamps = false;

    protected $fillable = [
        'leaser_name',
        'leaser_age',
        'leaser_address',
        'leaser_contactNo'
    ];
}
