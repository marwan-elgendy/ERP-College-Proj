<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Subject extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'subjects';
    protected $fillable = [
        'subject_id', 
        'organization_name',
        'faculty_name',
        'education_year',
        'education_semester',
        'subject_name',
        'hours_per_subject',
        'price_per_hour',
        'university_cut',
        'is_active'
    ];
    use HasFactory;
}
