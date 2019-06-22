<?php

namespace App\Http\Controllers\API\Pesan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pesan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Jam;
use App\Company;

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
        //
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
