<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quatas extends Model
{
    use HasFactory;



    protected $fillable = [
        'PolicyID',
        'Name',
        'Track',
        'Period',
        'Verdict',
        'Data',
        'LastQuota',
        'Comment',
        'Disabled',
    ];
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $table = 'quotas';

    public function policy()
    {
        return $this->belongsTo(Policy::class, 'PolicyID');
    }
}
