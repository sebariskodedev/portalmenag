<?php

namespace App\Exports;

use App\Models\KlikLayanan;
use Maatwebsite\Excel\Concerns\FromCollection;

class KlikLayananExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return KlikLayanan::all();
    }
}
