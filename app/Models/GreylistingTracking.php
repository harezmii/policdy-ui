<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GreylistingTracking extends Model
{
    use HasFactory;

    protected $fillable = [
        'TrackKey',
        'Sender',
        'Recipient',
        'FirstSeen',
        'LastUpdate',
        'Tries',
        'Count'
    ];

    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $table = 'greylisting_tracking';
}
