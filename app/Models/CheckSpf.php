<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckSpf extends Model
{
    use HasFactory;


    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $table = 'checkspf';
}
