<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class File extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'files';
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
