<?php

namespace App\Http\Controllers\API\Pesan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pesan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Jam;

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

        $pesanan =  DB::table('pesans')
                    ->select('jam_id', DB::raw('count(*) as total'))->where('company_id', $company_id)
                    ->where('tgl_pesan', $date)
                    ->where('status', '<>', 'Batal')
                    ->groupBy('jam_id')
                    ->get();

        $jams = Jam::all();

        $data_jam = [];
        $key1 = '';
        foreach($jams as $key => $value){
            foreach($pesanan as $p){
                if($jams[$key]->id == $p->jam_id){
                    $key1 = $key;
                }
            }
            unset($jams[$key1]);
        }



        $data = [
            'data' => $jams,
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
