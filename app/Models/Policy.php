<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Policy extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
        'Priority',
        'Description',
        'Disabled',
    ];
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $table = 'policies';

    public function quotas()
    {
        return $this->hasMany(Quatas::class, 'PolicyID');
    }
}
