<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolicyMember extends Model
{
    use HasFactory;
    protected $fillable = [
        'PolicyID',
        'Source',
        'Destination',
        'Comment',
        'Disabled',
    ];
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $table = 'policy_members';

}
