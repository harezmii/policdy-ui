<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolicyGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
        'Disabled',
        'Comment',
    ];
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $table = 'policy_groups';
}
