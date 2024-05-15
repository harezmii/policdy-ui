<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GreylistingAutoWhiteList extends Model
{
    use HasFactory;

    protected $fillable = [
        'TrackKey',
        'Added',
        'LastSeen',
        'Comment',
    ];

    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $table = 'greylisting_autowhitelist';
}
