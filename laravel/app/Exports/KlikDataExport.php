<?php

namespace App\Exports;

use App\Models\KlikData;
use Maatwebsite\Excel\Concerns\FromCollection;

class KlikDataExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return KlikData::all();
    }
}
