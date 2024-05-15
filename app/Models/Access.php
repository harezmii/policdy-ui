<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    use HasFactory;

    protected $fillable = [
        'PolicyID',
        'Name',
        'Verdict',
        'Data',
        'Comment',
        'Disabled'
    ];
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $table = 'access_control';
}
