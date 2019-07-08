<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\PesansExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithMapping;
use Barryvdh\DomPDF\Facade;
use Carbon\Carbon;
use App\Pesan;
use App\Driver;
use App\Company;
use App\User;
use App\Jam;
use Auth;
use PDF;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:company');
    }

    public function index()
    {
        $company_id = Auth::user()->id;
        $company = Company::find($company_id);
        $data['drivers'] = $company->drivers()->get();
        $data['data_pesan'] = $company->pesans()->get();
        // $data['users'] = User::all();
        return view('pages.company.pesan.datapesan')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['companies'] = Company::all();
        $jam['jams'] = Jam::all();
        return view('pages.company.pesan.add-pesan')->with($data, $jam);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'tgl_pesan' => 'required',
            // 'jam_id' => 'required',
        ]);

        $data = [
            'company_id'    => $request->company_id,
            'user_id'       => $request->user_id,
            'tgl_pesan'     => Carbon::parse($request->get('tgl_pesan')),
            'jam_id'        => 1,
            'status' => $request->status,
            // 'deskripsi_pesan'   => $request->deskripsi_pesan,
        ];

        $pesan = Pesan::create($data);
        if ($pesan)
            return redirect('pesan')->with('sukses', 'Sukses Tambah Data');

        return redirect('pesan')->with('error', 'Gagal Tambah Data');
    }

    public function konfirmasi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'driver_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('pesan')->with('error', 'Driver Kosong');
        }

        $pesan_id = $request->id;

        $pesan = Pesan::find($pesan_id);
        $pesan->driver_id = $request->driver_id;
        $pesan->status = "Dikonfirmasi";

        if ($pesan->save())
            return redirect('pesan')->with('sukses', 'konfirmasi sukses');

        return redirect('pesan')->with('error', 'konfirmasi error');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $company_id)
    {
        $data_pesan = Pesan::first();
        $company = Company::find($company_id);
        // Menyiapkan data untuk Charts
        // $categories = [];
        // $data = [];
        // $data[] = Pesan::all();
        
        $datas[] = Pesan::count();

        // foreach ($data_pesan as $pesans) {
            // $categories[] = $pesans->company->name;
            // $data[] = $pesans->company;
            // $data[] = $pesans->driver;
            // $data[] = $pesans->user;
            // $data[] = $pesans->jam;
            // $data[] = $pesans->pesans;
            // $data[] = Pesan::all();
            // $datas[] = Pesan::count();
        // }
        // dd($data);
        // dd($categories);
        return view('pages.company.pesan.detail-pesan', ['data_pesan' => $data_pesan,'datas' => $datas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function export()
    {
        // $company_id = Auth::user()->id;
        // $company = Company::find($company_id);
        // $data['drivers'] = $company->drivers()->get();
        // $data['data_pesan'] = $company->pesans()->get();

        return Excel::download(new PesansExport, 'Data-Pesan.xlsx');

        // return (new PesansExport)->download('datapesan.xlsx');
    }

    // public function showPDF()
    // {
    //     $company_id = Auth::user()->id;
    //     $company = Company::find($company_id);
    //     $data['drivers'] = $company->drivers()->get();
    //     $data['data_pesan'] = $company->pesans()->get();
    //     // $data['users'] = User::all();
    //     return view('pages.company.pesan.show-PDF')->with($data);
    // }

    public function cetakpdf()
    {
        // $company_id = Auth::user()->id;
        // $company = Company::find($company_id);
        // $data['drivers'] = $company->drivers()->get();
        // $data['data_pesan'] = $company->pesans()->get();

        $data_pesan = Pesan::all();

        $pdf = PDF::loadView('export.pesanPDF', ['data_pesan' => $data_pesan]);
        return $pdf->download('pesanPDF');
    }
}
