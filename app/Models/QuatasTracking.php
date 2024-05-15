<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuatasTracking extends Model
{
    use HasFactory;

    protected $fillable = [
        'QuotasLimitsID',
        'TrackKey',
        'LastUpdate',
        'Counter',
    ];
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $table = 'quotas_tracking';
}
