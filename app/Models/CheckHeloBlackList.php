<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckHeloBlackList extends Model
{
    use HasFactory;

    protected $fillable = [
        'Helo',
        'Comment',
        'Disabled',
    ];
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $table = 'checkhelo_blacklist';

}
