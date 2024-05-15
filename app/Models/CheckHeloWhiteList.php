<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckHeloWhiteList extends Model
{
    use HasFactory;

    protected $fillable = [
        'Source',
        'Comment',
        'Disabled',
    ];
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $table = 'checkhelo_whitelist';
}
