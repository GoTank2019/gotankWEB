<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;
use App\User;

class VerifyApiEmailController extends VerifyEmailBase
{
    protected function verificationUrl($notifiable)
	{
		return URL::temporarySignedRoute(

		'verificationapi.verify', Carbon::now()->addMinutes(60), ['id' => $notifiable->getKey()]

		); // this will basically mimic the email endpoint with get request

	}

	public function verify($email)
	{
		$user = User::where('email', $email)->whereNull('email_verified_at')->first();
		if ($user) {
			$user->email_verified_at = Carbon::now();
			$user->save();

			return redirect()->route('user.verify.success');
		} else{
			return redirect()->route('user.verify.failed');
		}

	}
}
