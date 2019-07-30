<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Validator;
use App\Company;
use App\Admin;

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
        $this->validate($request, [
        'name' => 'required|min:3',
        'email' => 'required|email|max:255|unique:companies',
        'password' => 'required|min:6|max:8',
        'address' => 'required',
        'harga' => 'required',
        'phone' => 'required|max:13|min:10|unique:companies',
      ]);
        //isian dari form tambah data
        $nama = $request->name;
        $email = $request->email;
        $password = $request->password;
        $phone = $request->phone;
        $harga = $request->harga;
        $address = $request->address;

        //isian dari table database
        $company = new \App\Company;
        $company->name = $nama;
        $company->email = $email;
        $company->password = bcrypt($password);
        $company->phone = $phone;
        $company->harga = $harga;
        $company->address = $address;

        $company->save();

        return redirect('admin/company')->with('sukses', 'Company Berhasil Ditambah');
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

    public function show(Request $request, $id)
    {
        $data_company = Company::find($id);
        // $data_company = \App\Company::all();
        // $company = $request->user()->id;
        // $data_driver = Driver::findOrFail($id);
        return view('pages.admin.company.detail-company',['data_company' => $data_company]);
        // $data_driver = Driver::findorFail($id);
        // return view('pages.company.driver.detail-driver', [$data_driver => Driver::findOrFail($id)]);
    }

    public function destroy($id)
    {
        $jam = \App\Company::find($id);
        $jam->delete();

        return redirect('admin/company')->with('sukses', 'data berhasil dihapus');
    }
}
