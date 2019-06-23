<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\DriversExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Driver;

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
        $data_driver = \App\Driver::all();
        return view('pages.company.driver.datadriver', ['data_driver' => $data_driver]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.company.driver.add-driver');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //isian dari form tambah data
        $nama = $request->name;
        $email = $request->email;
        $password = $request->password;
        $phone = $request->phone;

        //isian dari table database
        $driver = new \App\Driver;
        $driver->name = $nama;
        $driver->email = $email;
        $driver->password = bcrypt($password);
        $driver->api_token = bcrypt($nama);
        $driver->phone = $phone;

        $driver->save();

        return redirect('driver')->with('sukses', 'data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
