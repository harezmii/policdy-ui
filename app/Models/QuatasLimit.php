<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuatasLimit extends Model
{
    use HasFactory;

    protected $fillable = [
        'QuotasID',
        'Type',
        'CounterLimit',
        'Comment',
        'Disabled',
    ];
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $table = 'quotas_limits';
}
