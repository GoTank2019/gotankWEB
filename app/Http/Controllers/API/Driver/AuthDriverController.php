<?php

namespace App\Http\Controllers\API\Driver;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Driver;
use Auth;

class AuthDriverController extends Controller
{
  public function register(Request $request, Driver $driver){
      $this->validate($request,[
          'nama_driver' => 'required',
          'username' => 'required',
          'password' => 'required|min:6',
          'foto_driver' => 'required'
      ]);

      $driver = $driver->create([
          'nama_driver' => $request->nama_driver,
          'username' => $request->username,
          'password'=>bcrypt($request->password),
          'api_token' => bcrypt($request->username),
          'foto_driver' => $request->foto_driver
      ]);

      return [
          'status' => 1 ,
          'message' => 'Berhasil Daftar',
          'data' => $driver
      ];
  }

  public function login (Request $request, Driver $driver)
  {
      $crendential =[
          'username' => $request->username,
          'password' => $request->password
      ];

      if(!Auth::guard('driver')->attempt($crendential,$request->member))
      {
          return [
              'status' => 0,
              'message' => 'Gagal Login'
          ];
      }
      $driver = $driver->find(Auth::guard('driver')->user()->id);
      return[
          'status' => 1,
          'message' => 'Berhasil',
          'data' => $driver
      ];
  }
}
