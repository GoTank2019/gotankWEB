<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pesan;
use App\Driver;
use App\Company;
use App\User;
use App\Jam;

class AdminController extends Controller
{
    public function __construct(){
      $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
    	$data_pesan = Pesan::all();

    	// dd('datas');

    	$datas[] = Pesan::count();
      return view('pages.admin.dashboard', ['data_pesan' => $data_pesan, 'datas' => $datas]);
    }

}
