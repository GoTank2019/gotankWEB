@component('mail::message')
# Silahkan verifikasi email Anda

Klik tombol dibawah ini.

@component('mail::button', ['url' => route('user.verify', $user->email)])
Verifikasi Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
