<?php

namespace App\Exports;

use App\Models\Dumas;
use Maatwebsite\Excel\Concerns\FromCollection;

class DumasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Dumas::all();
    }
}
