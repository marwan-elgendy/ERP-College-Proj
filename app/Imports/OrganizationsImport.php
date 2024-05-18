<?php

namespace App\Imports;

use App\Models\Organization;
use Maatwebsite\Excel\Concerns\ToModel;

class OrganizationsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        dd("Row: ", $row);
        return new Organization([
            'name' => $row[1],
        ]);
    }
}
