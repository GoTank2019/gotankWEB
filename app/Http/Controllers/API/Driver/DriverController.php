<?php

namespace App\Http\Controllers\API\Driver;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Driver;
use App\Pesan;
use App\Company;
use App\User;
use Auth;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
      $pesan = DB::table('pesans')
            ->join('users', 'users.id', '=', 'pesans.user_id')
            ->select('pesans.id', 'users.name', 'users.address', 'users.phone', 'users.avatar','pesans.driver_id','pesans.status')
            ->where('pesans.driver_id', $id)
            ->where('pesans.status', 'Dikonfirmasi')
            ->get();

        return response()->json([
            'status' => 1,
            'message' => 'Berhasil',
            'data' => $pesan
        ], 200);

    }

    
    public function show($id)
    {
        $pesan = DB::table('pesans')
            ->join('users', 'users.id', '=', 'pesans.user_id')
            ->select('pesans.id', 'users.name', 'users.address', 'users.phone', 'users.avatar','pesans.driver_id','pesans.status', 'users.latitude', 'users.longitude')
            ->where('pesans.driver_id', $id)
            ->where('pesans.status', 'Selesai')
            ->orWhere('pesans.status', 'Sedang Dikerjakan')
            ->get();

        return response()->json([
            'status' => 1,
            'message' => 'Berhasil',
            'data' => $pesan
        ], 200);
    }

    public function showDetail($id)
    {
        $pesan = DB::table('pesans')
        ->join('users', 'users.id','=', 'pesans.user_id')
        ->select('pesans.id', 'users.name', 'users.address', 'users.phone', 'users.avatar','pesans.driver_id','pesans.status', 'users.latitude', 'users.longitude')
            ->where('pesans.id', $id)
            ->first();

        return response()->json([
            'status' => 1,
            'message' => 'Berhasil',
            'data' => $pesan
        ], 200);
    }

}
