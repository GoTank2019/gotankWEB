<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
// use Illuminate\Foundation\Auth\VerifiesEmails as VerifyEmailBase;
use Illuminate\Auth\Events\Verified;
use App\User;

class VerificationApiController extends Controller
{
    Use VerifiesEmails;

    public function verify(Request $request, $id)
    {
    	// $userID = $request['$id'];

    	$user = User::findOrFail($id);

    	$date = date("Y-m-d g:i:s");

    	$user->email_verified_at = $date;

    	$user->save();

    	return response()->json('Email Verified !');
    }

    public function resend(Request $request)
    {
    	if ($request->user()->hasVerifiedEmail()) {
    		return response()->json('User Already have verified email', 422);

    		// return redirect($this->redirectPath());
    	}
    	$request->user()->sendEmailVerificationNotification();

		return response()->json('The notification has been resubmitted');

		// return back()->with(‘resent’, true);
    }

}
