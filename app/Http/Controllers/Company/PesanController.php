<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\PesansExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithMapping;
// use Barryvdh\DomPDF\Facade;
use Carbon\Carbon;
use App\Pesan;
use App\Driver;
use App\Company;
use App\User;
use App\Jam;
use Auth;
use PDF;
use DB;

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
        return view('pages.company.pesan.add-pesan');
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
            // 'jam_id'        => $request->jam,
            'status' => $request->status,
            // 'deskripsi_pesan'   => $request->deskripsi_pesan,
        ];

        $pesan = Pesan::create($data);
        if ($pesan)
            return redirect('pesan')->with('sukses', 'Sukses Tambah Data');

        return redirect('pesan')->with('error', 'Gagal Tambah Data');
    }

    public function cek()
    {
        $token = array();

        $pesan_id = 4;
        $token_gcm = DB::table('pesans')
                ->join('users','users.id','=','pesans.user_id')
                ->select('users.token_gcm')
                ->where('pesans.id',$pesan_id)
                ->first()->token_gcm;

            array_push($token,$token_gcm);
            $apiKey = "AIzaSyC_47A3ViozzLxG91O4XZ12v-TEf20CDVI";
            $fields = array(
                'registration_ids'=>$token,
                'data' => array(
                    'title'=>"Pesan Baru",
                    'body'=>"wwoooiii",
                    'priority' => "high"
                )
            );

            $header = array('Authorization:key='.$apiKey,'Content-Type:application/json');

            $url = "https://fcm.googleapis.com/fcm/send";
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_POST,true);
            curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

            curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
            curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($fields));
            $result = curl_exec($ch);
            if ($result){
                echo "ok";
            } else {
                echo "000";
            }
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

        $token = array();
        $token_gcm = DB::table('pesans')
                ->join('users','users.id','=','pesans.user_id')
                ->select('users.token_gcm')
                ->where('pesans.id',$pesan_id)
                ->first()->token_gcm;

            array_push($token,$token_gcm);
            $apiKey = "AIzaSyC_47A3ViozzLxG91O4XZ12v-TEf20CDVI";
            $fields = array(
                'registration_ids'=>$token,
                'data' => array(
                    'title'=>"Pesan Baru",
                    'body'=>"Pesanan Anda Telah Dikonfirmasi",
                    'priority' => "high",
                    'pesan_id' => $pesan_id
                )
            );

            $header = array('Authorization:key='.$apiKey,'Content-Type:application/json');

            $url = "https://fcm.googleapis.com/fcm/send";
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_POST,true);
            curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

            curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
            curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($fields));
            $result = curl_exec($ch);
            if ($result){
                $pesan = Pesan::find($pesan_id);
                $pesan->driver_id = $request->driver_id;
                $pesan->status = "Dikonfirmasi";

                if ($pesan->save()){
                    
                    return redirect('pesan')->with('sukses', 'konfirmasi sukses');
                }

                return redirect('pesan')->with('error', 'konfirmasi error');
            } else {
                return redirect('pesan')->with('error', 'konfirmasi error');
            }
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
        // $company = Company::find($company_id);
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
        $data_driver = \App\Pesan::find($id);
        $data_driver->delete();

        return redirect('pesan')->with('sukses', 'data berhasil dihapus');
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
