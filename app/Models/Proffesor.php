<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Proffesor extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'proffesors';
    protected $fillable = [
        'name',
        'subject_id',
        'mobile_number',
        'national_id',
        'subject_cut',
        'is_active'
    ];
    use HasFactory;
}
