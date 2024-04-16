@component('mail::message')

Hello {{ $user->nama }}

@component('mail::button', ['url' => url('/atur-ulang/'.$user->remember_token)])
Atur ulang password
@endcomponent

Silahkan klik tombol diatas untuk melakukan atur ulang password akun anda.<br>
{{ config('app.name') }}
@endcomponent