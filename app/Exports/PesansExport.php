<?php

namespace App\Exports;

use App\Pesan;
use Maatwebsite\Excel\Concerns\FromCollection;

class PesansExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pesan::all();
    }
}
