<?php

namespace App\Exports;

use App\Pesan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Auth;
use App\Driver;
use App\Company;

class PesansExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pesan::all();
        // $company_id = Auth::user()->id;
        // $company = Company::find($company_id);
        // $data['drivers'] = $company->drivers()->get();
        // $data['data_pesan'] = $company->pesans()->get();
    }

    public function map($pesans): array
    {
        return [
            $pesans->company->name,
            $pesans->tgl_pesan,
            $pesans->jam->jam,
            $pesans->bukti_pembayaran,
            $pesans->status
        ];
    }

    public function headings(): array
    {
        return [
            'Nama Company',
            'Tanggal Pemesanan',
            'Jam Pemesanan',
            'Struck Pembayaran',
            'Status',
        ];
    }
}
