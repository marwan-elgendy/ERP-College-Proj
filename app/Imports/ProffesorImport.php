<?php

namespace App\Imports;

use App\Models\Proffesor;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProffesorImport implements ToCollection
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
            Proffesor::create([
                'id' => $row[0],
                'subject_id' => $row[1],
                'name' => $row[2],
                'mobile_number' => $row[3],
                'national_id' => $row[4],
                'subject_cut' => $row[5],
                'is_active' => $row[6]
            ]);
        }
    }
}
