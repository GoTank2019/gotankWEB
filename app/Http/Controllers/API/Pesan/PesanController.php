<?php

namespace App\Http\Controllers\API\Pesan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pesan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Jam;
use App\Company;
use Illuminate\Support\Facades\Validator;

class PesanController extends Controller
{
    public function index()
    {
        //
    }

    public function getJam(Request $request)
    {
        $company_id = $request->get('company_id');
        $date = Carbon::parse($request->get('date'));
        $driver_count = Company::find($company_id)->first()->drivers()->count();

        $pesanan =  DB::table('pesans')
            ->select('jam_id', DB::raw('count(*) as total'))->where('company_id', $company_id)
            ->where('tgl_pesan', $date)
            ->where('status', '<>', 'Batal')
            ->groupBy('jam_id')
            ->get();

        $jams = Jam::all();

        $data_jam = [];
        $check = FALSE;
        foreach ($jams as $jam) {
            foreach ($pesanan as $p) {
                if ($jam->id == $p->jam_id && $p->total >= $driver_count) {
                    $check = TRUE;
                    break;
                }
            }

            if (!$check) {
                $data_jam[] = $jam;
            }

            $check = FALSE;
        }



        $data = [
            'data' => $data_jam,
            'message'   => 'Success'
        ];
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_id' => 'required',
            'user_id'   => 'required',
            'tgl_pesan' => 'required',
            'jam_id' => 'required',
            'deskripsi_pesan' => 'required',
        ]);

        if ($validator->fails()) {
            $response = [
                'message' => 'Cek kembali data Anda!',
                'status'  => 0
            ];

            return response()->json($response, 200);
        }

        $data = [
            'company_id'    => $request->company_id,
            'user_id'       => $request->user_id,
            'tgl_pesan'     => Carbon::parse($request->get('tgl_pesan')),
            'jam_id'        => $request->jam_id,
            'deskripsi_pesan'   => $request->deskripsi_pesan,
        ];

        $pesan = Pesan::create($data);

        if ($pesan) {
            $response = [
                'message' => 'Sukses simpan data!',
                'status'  => 1,
                'data'  => $pesan
            ];
        } else {
            $response = [
                'message' => 'Gagal simpan data!',
                'status'  => 0
            ];
        }

        return response()->json($response, 200);
    }

    public function show($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
