<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\Pesan;
use App\Driver;
use App\User;
use Storage;
use File;
use Auth;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:company');
    }

    public function index()
    {
        return view('templates.company.default');
    }

    public function profile()
    {
        $company = \App\Company::find(auth::user()->id);
        return view('pages.company._Profile', ['company' => $company]);
    }

    public function edit(Request $request)
    {
        $company = \App\Company::find(auth::user()->id);
        return view('pages.company.update-profile', ['company' => $company]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'description' => 'max:200',
            'avatar' => 'image|mimes:jpg,jpeg,png|max:2000'
        ]);
        //dd($request->all());

        $company = Company::where('id', Auth::user()->id)->first();

        // $company = Company::find($id);

        if ($request->avatar) {
            $image_path = $company->avatar;
            if ($image_path == 'default.jpg') {
                $imgName = $request->file('avatar')->getClientOriginalName();
                $request->file('avatar')->move('img', $imgName);

                $company->avatar = $request->file('avatar')->getClientOriginalName();
                $company->update([
                    'description' => $request->description,
                    'avatar' => $imgName,
                ]);
            } else {
                if (\File::exists(public_path('img/' . $image_path))) {
                    \File::delete(public_path('img/' . $image_path));
                }
                $imgName = $request->file('avatar')->getClientOriginalName();
                $request->file('avatar')->move('img', $imgName);

                $company->avatar = $request->file('avatar')->getClientOriginalName();
                $company->update([
                    'description' => $request->description,
                    'avatar' => $imgName,
                ]);
            }
        } else {
            $company->update([
                'description' => $request->description,
            ]);
        }

        return redirect()->back();
    }
}
