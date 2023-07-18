<?php

namespace App\Imports;

use App\Models\PrixDepense;
use Maatwebsite\Excel\Concerns\ToModel;

class PrixDepenseImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PrixDepense([
            "iddepense" => $row['iddepense'],
            "prix" => $row['prix'],
            "inserted" => $row['inserted']
        ]);
    }
}
