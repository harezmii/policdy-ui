<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounting extends Model
{
    use HasFactory;

    protected $fillable = [
        'PolicyID',
        'Name',
        'Track',
        'AccountingPeriod',
        'MessageCountLimit',
        'MessageCumulativeSizeLimit',
        'Verdict',
        'Data',
        'LastAccounting',
        'Comment',
        'Disabled'
    ];
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $table = 'accounting';

}
