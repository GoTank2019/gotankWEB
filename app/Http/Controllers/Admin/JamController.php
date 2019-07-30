<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jam;
use Auth;

class JamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $data_jam = Jam::all();
        return view('pages.admin.jam.datajam', ['data_jam' => $data_jam]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_jam = Jam::all();
        return view('pages.admin.jam.add-jam', ['data_jam' => $data_jam]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $d_jam = $request->jam;

        $jam = new \App\Jam;
        $jam->jam = $d_jam;

        $jam->save();

        return redirect('admin/jam')->with('sukses', 'Jam Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $iddr
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $d_jam = \App\Jam::find($id);
        return view('pages.admin.jam.datajam', ['d_jam' => $d_jam]);
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
        $d_jam = $request->jam;

        $jam = new \App\Jam;
        $jam->jam = $d_jam;

        $jam->save();

        return redirect('admin/jam')->with('sukses', 'Jam Berhasil Diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jam = \App\Jam::find($id);
        $jam->delete();

        return redirect('admin/jam')->with('sukses', 'data berhasil dihapus');
    }
}
