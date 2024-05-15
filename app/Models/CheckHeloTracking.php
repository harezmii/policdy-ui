<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckHeloTracking extends Model
{
    use HasFactory;

    protected $fillable = [
        'Address',
        'Helo',
        'LastUpdate',
    ];
    public $timestamps = false;
    protected $table = 'checkhelo_tracking';
}
