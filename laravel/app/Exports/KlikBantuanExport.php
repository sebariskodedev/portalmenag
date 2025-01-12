<?php

namespace App\Exports;

use App\Models\KlikBantuan;
use Maatwebsite\Excel\Concerns\FromCollection;

class KlikBantuanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return KlikBantuan::all();
    }
}
