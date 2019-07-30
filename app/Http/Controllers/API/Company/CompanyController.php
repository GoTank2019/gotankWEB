<?php

namespace App\Http\Controllers\API\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\Driver;
use App\Pesan;
use App\User;
use DB;

class CompanyController extends Controller{
  public function index(){
    $companies = Company::all();
    if ($companies->isEmpty()) {
      return response()->json([
        'status' => 0,
        'message' => 'Not Found',
      ], 200);
    }else{
      return response()->json([
        'status' => 1,
        'message' => 'Berhasil',
        'data' => $companies
      ], 200);
    }
  }

  public function show($id)    {
        $company = Company::find($id);
        if(is_null($company)){
			return response() -> json(array(
        'message'=>'record not found',
        'status'=>0),200);
        }
		return response()->json(['status' => 1,'message' => 'Ok','data' => $company
      ], 200);

    }

    public function driver(Request $request)
    {
        $company = Company::findOrFail($request->get('id'));
        $driver = $company->drivers()->get();

        return response()->json($driver);
    }

    public function company(Request $request)
    {
        $driver = Driver::findOrFail($request->get('id'));
        $company = $driver->company()->first();

        return response()->json($company);
    }

    public function showKomentar($id)
    {
       $pesan = DB::table('pesans')
            ->join('users', 'users.id', '=', 'pesans.user_id')
            ->select('pesans.id', 'users.name', 'users.avatar', 'pesans.komentar', 'pesans.user_id')
            ->where('pesans.company_id', $id)
            ->get();
        // $komen = Pesan::where('komentar', $pesan->komentar)->first();
        return response()->json([
            'message' => 'Berhasil',
            'status' => 1,
            'data' => $pesan
            ]);
    }

    public function search(Request $request)
    {
        // $tour = Tour::where('title','LIKE','%'.$request->search.'%')->orWhere('harga','LIKE','%'.$request->search.'%')->get();
        $company = Company::where('name','LIKE','%'.$request->search.'%')
                            ->orWhere('harga','LIKE','%'.$request->search.'%')->get();
                            // ->orWhere('harga', 'LIKE', '%'.$request->search.'%')
                            
          return response()->json([
            'status' => 1,
            'message' => 'Success',
            'data' => $company
          ], 200);
        // $data = $request->search;

        // $company = DB::table('companies')
        //                 ->where('name', 'LIKE', '%'.$data.'%')
        //                 ->orWhere('harga', 'LIKE', '%'.$data.'%')
        //                 ->get();

        // return response()->json([
        //     'message' => 'Berhasil',
        //     'status' => 1,
        //     'data' => $company
        // ], 200);

        // $query = $request->search;
        // $cari = Company::where('name', 'LIKE', '%'.$query.'%')->get();

        // if (sizeof($cari) > 0) {
        //     return response()->json(Response::tran)
        // }
    }
}
