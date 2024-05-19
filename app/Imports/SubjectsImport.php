<?php

namespace App\Imports;

use App\Models\Subject;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SubjectsImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Skip the first row
        $rows->shift();
        // Don't insert empty rows
        $rows = $rows->filter(function($row){
            return !empty($row[0]);
        });
        foreach ($rows as $row)
        {
            Subject::create([
                'subject_id' => $row[0],
                'organization_name' => $row[1],
                'faculty_name' => $row[2],
                'education_year' => $row[3],
                'education_semester' => $row[4],
                'subject_name' => $row[5],
                'hours_per_subject' => $row[6],
                'price_per_hour' => $row[7],
                'university_cut' => $row[8],
                'is_active' => $row[9]
            ]);
        }
    }
}
