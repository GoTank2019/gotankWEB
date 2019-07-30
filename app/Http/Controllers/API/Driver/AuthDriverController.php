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

    public function show($id)
    {
        $driver = Driver::find($id);
        if (is_null($driver)) {
            return response()->json(array(
                'message' => 'Tidak ada data',
                'status' => 0
            ), 200);
        }
        return response()->json([
            'status' => 1,
            'message' => 'Ok',
            'data' => $driver
        ], 200);
    }

    public function updatePhone(Request $request, $id)
    {
        $driver = Driver::find($id);
        $driver->update([
            'phone' => $request->phone,
            // 'longitude' => $request->longitude,
            // 'latitude'  => $request->latitude,
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'Ok',
            'data' => $driver
        ], 200);
    }

    public function updatePassword(Request $request, $id)
    {
        $user = Driver::find($id);
        $user->update([
            'password' => bcrypt($request->password),
            // 'longitude' => $request->longitude,
            // 'latitude'  => $request->latitude,
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'Ok',
            'data' => $user
        ], 200);
    }


    public function updateImage(Request $request, $id)
    {
        // $user = User::find(Auth::user()->id);
        $driver = Driver::find($id);

        if ($request->avatar) {
            $image_path = $driver->avatar;
            if ($image_path == 'default.jpg') {
                $imgName = $request->file('avatar')->getClientOriginalName();
                $request->file('avatar')->move('img', $imgName);

                $driver->avatar = $request->file('avatar')->getClientOriginalName();
                $driver->update([
                    'avatar' => $imgName,
                ]);
            } else {
                if (\File::exists(public_path('img/' . $image_path))) {
                    \File::delete(public_path('img/' . $image_path));
                }
                $imgName = $request->file('avatar')->getClientOriginalName();
                $request->file('avatar')->move('img', $imgName);

                $driver->avatar = $request->file('avatar')->getClientOriginalName();
                $driver->update([
                    'avatar' => $imgName,
                ]);
            }
        } else {
            return response()->json([
                'message' => 'Gambar tidak tersimpan',
                'status' => 0,
            ], 200);
        }

        return response()->json([
            'status' => 1,
            'message' => 'Berhasil',
            'data' => $driver
        ], 200);
    }
}
