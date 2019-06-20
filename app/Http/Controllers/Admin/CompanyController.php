<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Company;

class CompanyController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }

    public function index()
    {
    	$data_company = \App\Company::all();
    	return view ('pages.admin.company.datacompany', ['data_company' => $data_company]);
    }

    public function create()
    {
    	return view ('pages.admin.company.add-company');
    }

    public function store(Request $request)
    {
        //isian dari form tambah data
        $nama = $request->name;
        $email = $request->email;
        $password = $request->password;
        $phone = $request->phone;
        $address = $request->address;

        //isian dari table database
        $company = new \App\Company;
        $company->name = $nama;
        $company->email = $email;
        $company->password = bcrypt($password);
        $company->phone = $phone;
        $company->address = $address;

        $company->save();

        return redirect('admin/company');
    }

    public function edit($id)
    {
        $data_company = \App\Company::find($id);
        return view('pages.admin.company.edit-company', ['data_company' => $data_company]);
        // return view ('pages.company.driver.edit-driver')->with('$data_driver');
    }

    public function update(Request $request, $id)
    {
        //isian dari form tambah data
        $nama = $request->name;
        $email = $request->email;
        $password = $request->password;
        $phone = $request->phone;
        $address = $request->address;

        //isian dari table database
        $company = \App\Company::find($id);
        $company->name = $nama;
        $company->email = $email;
        $company->password = bcrypt($password);
        $company->phone = $phone;
        $company->address = $address;

        $company->save();

        return redirect('admin/company');
    }
}
