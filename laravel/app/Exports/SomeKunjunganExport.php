<?php

namespace App\Exports;

use App\Models\Kunjungan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SomeKunjunganExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $data;

    // Constructor to accept the data
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Return the collection of data for export.
     */
    public function collection()
    {
        return $this->data;
    }

    /**
     * Dynamically define the headings for the exported file.
     */
    public function headings(): array
    {
        if ($this->data->isEmpty()) {
            return [];
        }

        // Get the keys of the first item in the collection
        return array_keys($this->data->first()->toArray());
    }
}
