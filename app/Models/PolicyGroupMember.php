<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolicyGroupMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'PolicyGroupID',
        'Member',
        'Disabled',
        'Comment',
    ];
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $table = 'policy_group_members';
}
