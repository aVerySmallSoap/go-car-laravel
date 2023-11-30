<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    protected $guarded = [
        'leaser_id'
    ];

    public function cars(): HasMany{
        return $this->hasMany(Car::class, 'leaser_name', 'leaser_name');
    }
}
