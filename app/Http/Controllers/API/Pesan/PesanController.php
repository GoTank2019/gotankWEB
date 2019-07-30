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
use Auth;
use App\User;
use App\Driver;

class PesanController extends Controller
{
    public function index()
    {
        //
    }

    public function getJam(Request $request)
    {
        $company_id = $request->get('company_id');
        $date = Carbon::parse($request->get('date'))->format('Y-m-d');
        $driver_count = Company::find($company_id)->first()->drivers()->count();

        $pesanan =  DB::table('pesans')
            ->select('jam_id', DB::raw('count(*) as total'))->where('company_id', $company_id)
            ->where('tgl_pesan', $date)
            ->where('status', '<>', 'Batal')
            ->groupBy('jam_id')
            ->get();

        $jams = Jam::all();
        $date_now = Carbon::now()->format('Y-m-d');
        $jam_now = date('H', strtotime("+3 hours"));
        $jam_now = (int) $jam_now;
        $jam_now_ori = (int) date('H');

        $data_jam = [];
        $check = FALSE;

        if($date == $date_now && $jam_now_ori >= 21){
            $data_jam = [];
            
        } else{
            foreach ($jams as $jam) {
                foreach ($pesanan as $p) {
                    if ($jam->id == $p->jam_id && $p->total >= $driver_count) {
                        $check = TRUE;
                        break;
                    }
                }

                if($date == $date_now && $jam->value <= $jam_now ){
                    $check = TRUE;
                }

                if (!$check) {
                    $data_jam[] = $jam;
                }

                $check = FALSE;
            }
        }

             // $data_jam = [
             //        'date_now' => $date_now,
             //        'jam_now' => $jam_now_ori,
             //        'date' => $date];



        $data = [
            'status' => 1,
            'message'   => 'Success',
            'data' => $data_jam

        ];
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_id' => 'required',
            'user_id'   => 'required',
            'tgl_pesan' => 'required',
            'jam_id' => 'required',
            // 'deskripsi_pesan' => 'required',
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
            // 'deskripsi_pesan'   => $request->deskripsi_pesan,
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
        // $id = Auth::user()->id;
        //menampilkan data dengan inner join
        $history = DB::table('pesans')
            ->join('companies', 'companies.id', '=', 'pesans.company_id')
            ->select('pesans.id', 'companies.name', 'companies.avatar', 'pesans.tgl_pesan', 'pesans.status')
            ->where('pesans.user_id', $id)
            ->get();
        return response()->json([
            'message' => 'Berhasil',
            'status' => 1,
            'data' => $history
        ]);
    }

    public function showDetailHistory($id)
    {
        $pesan = DB::table('pesans')
            ->join('companies', 'companies.id', '=', 'pesans.company_id')
            ->select('pesans.id', 'companies.name', 'companies.avatar', 'companies.harga', 'pesans.tgl_pesan', 'pesans.status', 'pesans.komentar', 'pesans.user_id', 'pesans.driver_id')
            ->where('pesans.id', $id)
            ->first();
        $user = User::where('id', $pesan->user_id)->first();
        $driver = Driver::where('id', $pesan->driver_id)->first();
        // $company = Company::where('id', $pesan->company_id)->first();
        if ($driver == null) {
            return response()->json([
                'message' => 'Berhasil',
                'status' => 1,
                'data' => [
                    'id' => $pesan->id,
                    'name' => $pesan->name,
                    'harga' => $pesan->harga,
                    'avatar' => $pesan->avatar,
                    'tgl_pesan' => $pesan->tgl_pesan,
                    'status' => $pesan->status,
                    'user' => [
                        'id' => $user->id,
                        'address' => $user->address
                    ]
                ]
            ]);
        }
        return response()->json([
            'message' => 'Berhasil',
            'status' => 1,
            'data' => [
                'id' => $pesan->id,
                'name' => $pesan->name,
                'harga' => $pesan->harga,
                'avatar' => $pesan->avatar,
                'tgl_pesan' => $pesan->tgl_pesan,
                'status' => $pesan->status,
                'komentar' => $pesan->komentar,
                'user' => [
                    'id' => $user->id,
                    'address' => $user->address
                ],
                'driver' => [
                    'id' => $driver->id,
                    'name' => $driver->name
                ]
            ]
        ]);
    }

    public function destroy($id)
    {
        //
    }

    public function showJam()
    {
        $data_jam = Jam::all();
        if ($data_jam->isEmpty()) {
            return response()->json([
                'status' => 0,
                'message' => 'Not Found',
            ], 200);
        } else {
            return response()->json([
                'status' => 1,
                'message' => 'Berhasil',
                'data' => $data_jam
            ], 200);
        }
    }

    public function uploadBukti(Request $request, $id)
    {
        $pesan = Pesan::find($id);

        if ($request->bukti_pembayaran) {
            $image_path = $pesan->bukti_pembayaran;
            if ($image_path == null) {
                $imgName = $request->file('bukti_pembayaran')->getClientOriginalName();
                $request->file('bukti_pembayaran')->move('img', $imgName);

                $pesan->bukti_pembayaran = $request->file('bukti_pembayaran')->getClientOriginalName();
                $pesan->update([
                    'bukti_pembayaran' => $imgName,
                    'status' => 'Belum Dikonfirmasi',
                ]);
            } else {
                if (\File::exists(public_path('img/' . $image_path))) {
                    \File::delete(public_path('img/' . $image_path));
                }
                $imgName = $request->file('bukti_pembayaran')->getClientOriginalName();
                $request->file('bukti_pembayaran')->move('img', $imgName);

                $pesan->bukti_pembayaran = $request->file('bukti_pembayaran')->getClientOriginalName();
                $pesan->update([
                    'bukti_pembayaran' => $imgName,
                    'status' => 'Belum Dikonfirmasi',
                ]);
            }
        } else {
            return response()->json([
                'message' => 'Gambar tidak tersimpan',
                'status' => 0,
            ], 200);
        }

        return response()->json([
            'status' => 1,
            'message' => 'Berhasil',
            'data' => $pesan
        ], 200);
    }

    public function driverKonfirmasi(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            $response = [
                'message' => 'Status kosong!',
                'status'  => 0
            ];

            return response()->json($response, 400);
        }

        $pesan = Pesan::find($id);
        $pesan->status = $request->status;

        if ($pesan->save()) {
            $response = [
                'message' => 'Sukses konfirmasi!',
                'status'  => 1,
                'data'  => $pesan
            ];
        } else {
            $response = [
                'message' => 'Gagal konfirmasi!',
                'status'  => 0
            ];
        }

        return response()->json($response, 200);
    }

    public function showPesan(Request $request, $id)
    {

    }

    // public function status(Request $request, $id)
    // {
    //     $status = Pesan::find($id)
    //     if ($request->status) {
    //         $keterangan = $status->status;

    //         if ($keterangan == 'Belum Dibayar') {

    //         }
    //     }
    // }

    public function updateKomentar(Request $request, $id)
    {
        $pesan = Pesan::find($id);
        $pesan->update([
            'komentar' => $request->komentar,
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'Ok',
            'data' => $pesan
        ], 200);

    }
}
