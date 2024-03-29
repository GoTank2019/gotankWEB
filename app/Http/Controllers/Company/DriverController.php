<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\DriversExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Driver;
use App\Company;
use Auth;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:company');
    }
    
    public function index()
    {
        $company_id = Auth::user()->id;
        $company = Company::find($company_id);
        $data ['data_driver'] = $company->drivers()->get();
        $driver = Driver::where('id', $company->driver_id)->first();
        if ($driver == null) {
            return view('pages.company.driver.datadriver')->with($data);
        }
        return view('pages.company.driver.datadriver')->with($data);
        // $data_driver = \App\Driver::all();
        // return view('pages.company.driver.datadriver', ['data_driver' => $data_driver]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company_id = Auth::user()->id;
        $company = Company::find($company_id);
        $data ['data_driver'] = $company->drivers()->get();
        return view('pages.company.driver.add-driver')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
        'name' => 'required|min:3',
        'email' => 'required|email|max:255|unique:drivers',
        'password' => 'required|min:6',
        'phone' => 'required|max:13|min:10|unique:drivers',
      ]);
        //isian dari form tambah data
        // $data_driver = Company::findOrFail($request->get('id'));
        // $driver = $data_driver->drivers()->get();

        $company_id = Auth::user()->id;
        $company = Company::find($company_id);
        $data ['data_driver'] = $company->drivers()->get();

        $company_id = Auth::user()->id;
        $nama = $request->name;
        $email = $request->email;
        $password = $request->password;
        $phone = $request->phone;

        //isian dari table database
        $driver = new \App\Driver;
        $driver->company_id = $company_id;
        $driver->name = $nama;
        $driver->email = $email;
        $driver->password = bcrypt($password);
        $driver->api_token = bcrypt($nama);
        $driver->phone = $phone;

        $driver->save();

        return redirect('driver')->with('sukses', 'data berhasil ditambah', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $data_driver = Driver::find($id);
        $company = $request->user()->id;
        $data_driver = Driver::findOrFail($id);
        return view('pages.company.driver.detail-driver',compact('data_driver'));
        // $data_driver = Driver::findorFail($id);
        // return view('pages.company.driver.detail-driver', [$data_driver => Driver::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_driver = \App\Driver::find($id);
        return view('pages.company.driver.edit-driver', ['data_driver' => $data_driver]);
        // return view ('pages.company.driver.edit-driver')->with('$data_driver');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //isian dari form tambah data
        $nama = $request->name;
        $email = $request->email;
        $password = $request->password;
        $phone = $request->phone;

        //isian dari table database
        $driver = \App\Driver::find($id);
        $driver->name = $nama;
        $driver->email = $email;
        $driver->password = bcrypt($password);
        $driver->api_token = bcrypt($nama);
        $driver->phone = $phone;

        $driver->save();

        return redirect('driver')->with('sukses', 'data berhasil di update !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_driver = \App\Driver::find($id);
        $data_driver->delete();

        return redirect('driver')->with('sukses', 'data berhasil dihapus');
    }

    public function export() 
    {
        return Excel::download(new DriversExport, 'Driver.xlsx');
    }
}
