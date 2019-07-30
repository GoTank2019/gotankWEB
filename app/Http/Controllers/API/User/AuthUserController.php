<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\SendVerification;
use App\User;
use Auth;
use DB;
use Mail as mail;
use Response;

class AuthUserController extends Controller
{
    //user register di android
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required|min:11',
            'address' => 'required',
            // 'latitude' => 'required',
            // 'longitude' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            // 'api_token' => bcrypt($request->email),
            'phone' => $request->phone,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        mail::to($user->email)->send(new SendVerification($user));

        return response()->json([
            'status' => 1,
            'message' => 'Berhasil Daftar',
            'data' => $user
        ], 201);

        
    }

    //user login di android
    public function login(Request $request)
    {
        $api_token_gcm = $request->api_token_gcm;
            // 'api_token' => bcrypt($request->email),

        $api_token = bcrypt($request->email);
        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];


        $user = User::where('email', $request->email)->first();
        if(!$user->email_verified_at){
            return response()->json([
                'status' => 0,
                'message' => 'Email belum diverifikasi'
            ], 200);
        }

        if (!Auth::guard('web')->attempt($credential, $request->member)) {
            return response()->json([
                'status' => 0,
                'message' => 'Gagal Login'
            ], 200);
        }



        $user = User::find(Auth::user()->id);
        if ($user){
            DB::table('users')->where(['id'=>Auth::user()->id])
            ->update(['token_gcm'=>$api_token_gcm, 'api_token' =>$api_token]);
            return response()->json([
                'status' => 1,
                'message' => 'Berhasil',
                'data' => $user
            ], 200);
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Gagal Login'
            ], 200);
        }
    }

    public function show($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return response()->json(array(
                'message' => 'Tidak ada data',
                'status' => 0
            ), 200);
        }
        return response()->json([
            'status' => 1,
            'message' => 'Ok',
            'data' => $user
        ], 200);
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            // 'longitude' => $request->longitude,
            // 'latitude'  => $request->latitude,
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'Ok',
            'data' => $user
        ], 200);
    }

    public function updateProfileHp(Request $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'phone' => $request->phone,
            // 'longitude' => $request->longitude,
            // 'latitude'  => $request->latitude,
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'Ok',
            'data' => $user
        ], 200);
    }

    public function updateProfileAddress(Request $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'address' => $request->address,
            // 'longitude' => $request->longitude,
            // 'latitude'  => $request->latitude,
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'Ok',
            'data' => $user
        ], 200);
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::find($id);
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
        $user = User::find($id);

        if ($request->avatar) {
            $image_path = $user->avatar;
            if ($image_path == 'default.jpg') {
                $imgName = $request->file('avatar')->getClientOriginalName();
                $request->file('avatar')->move('img', $imgName);

                $user->avatar = $request->file('avatar')->getClientOriginalName();
                $user->update([
                    'avatar' => $imgName,
                ]);
            } else {
                if (\File::exists(public_path('img/' . $image_path))) {
                    \File::delete(public_path('img/' . $image_path));
                }
                $imgName = $request->file('avatar')->getClientOriginalName();
                $request->file('avatar')->move('img', $imgName);

                $user->avatar = $request->file('avatar')->getClientOriginalName();
                $user->update([
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
            'data' => $user
        ], 200);
    }
}
