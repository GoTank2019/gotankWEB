<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Storage;
use File;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }
    
    public function index()
    {
        $data['user'] = \App\User::all();
    	return view ('pages.admin.user.datauser')->with($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view ('pages.admin.user.add-user');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $data = User::find($id);
        return view('pages.admin.user.detail-user', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user'] = \App\User::find($id);
    	return view ('pages.admin.user.edit-user')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'address' => 'max:200',
            'avatar' => 'image|mimes:jpg,jpeg,png|max:2000',
        ]);

        // dd($request->all());

        $user = \App\User::where('id',Auth::user()->id)->first();
        // // $user = \App\User::find($id);
    
        if ($request->avatar) {
            $image_path = $user->avatar;
            if ($image_path == 'pictures/default.jpg') {
              $image = $request->file('avatar')->store('pictures');
              $user->update([
                  'address' => $request->address,
                  'avatar' => $image,
                ]);
            }else {
              if (Storage::exists($image_path)) {
                  Storage::delete($image_path);
              }
              $image = $request->file('avatar')->store('pictures');
              $user->update([
                  'address' => $request->address,
                  'avatar' => $image,

              ]);
            }
        } else{
            $user->update([
                'address' => $request->address,
            ]);
        }

        return redirect('admin/user');


        //  //isian dari form tambah data
        //  $nama = $request->name;
        //  $email = $request->email;
        //  $phone = $request->phone;
        //  $address = $request->address;
        //  $image = $request->avatar;
 
        //  //isian dari table database
        //  $user = \App\User::find($id);
        //  $user->name = $nama;
        //  $user->email = $email;
        //  $user->phone = $phone;
        //  $user->address = $address;
 
        //  $user->save();
 
        //  return redirect('admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
