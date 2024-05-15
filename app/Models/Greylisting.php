<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Greylisting extends Model
{
    use HasFactory;
    protected $fillable = [
        'PolicyID',
        'Name',
        'UseGreylisting',
        'GreylistPeriod',
        'Track',
        'GreylistAuthValidity',
        'GreylistUnAuthValidity',
        'UseAutoWhitelist',
        'AutoWhitelistPeriod',
        'AutoWhitelistCount',
        'AutoWhitelistPercentage',
        'UseAutoBlacklist',
        'AutoBlacklistPeriod',
        'AutoBlacklistCount',
        'AutoBlacklistCount',
        'AutoBlacklistPercentage',
        'Comment',
        'Disabled'
    ];

    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $table = 'greylisting';

}
