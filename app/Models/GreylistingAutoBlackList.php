<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GreylistingAutoBlackList extends Model
{
    use HasFactory;
    protected $fillable = [
        'TrackKey',
        'Added',
        'Comment',
    ];

    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $table = 'greylisting_autoblacklist';
}
