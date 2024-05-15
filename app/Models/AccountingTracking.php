<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountingTracking extends Model
{
    use HasFactory;

    protected $fillable = [
        'PolicyID',
        'TrackKey',
        'PeriodKey',
        'LastUpdate',
        'MessageCount',
        'MessageCumulativeSize',
    ];

    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $table = 'accounting_tracking';
}
