<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pesan;
use App\Driver;
use App\Company;
use App\Jam;
use Auth;

class PesanController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }

    public function index()
    {
    	$company_id = Auth::user()->id;
        $company = Company::find($company_id);
        $data['drivers'] = $company->drivers()->get();
        $data['data_pesan'] = $company->pesans()->get();
        // $data['users'] = User::all();
        return view('pages.admin.pesan.datapesan')->with($data);
    }
}
