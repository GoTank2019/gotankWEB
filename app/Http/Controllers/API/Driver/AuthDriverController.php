<?php

namespace App\Http\Controllers\API\Driver;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Driver;
use Auth;

class AuthDriverController extends Controller
{
  public function login (Request $request, Driver $driver)
  {
      $crendential =[
          'name' => $request->name,
          'password' => $request->password
      ];

      if(!Auth::guard('driver')->attempt($crendential,$request->member))
      {
          return response()->json([
              'status' => 0,
              'message' => 'Gagal Login'
          ], 200);
      }
      $driver = $driver->find(Auth::guard('driver')->user()->id);
      return response()->json([
          'status' => 1,
          'message' => 'Berhasil',
          'data' => $driver
      ], 200);

    }
}
