@component('mail::message')
 Hello {{$user->name}} 
 
<p>We understand this hapens</p> 

@component('mail::button', ['url'=> url('reset', $user->remember_token)])
Reset Password
@endcomponent

<p>If you have any issues reseting your password, do not hesitate to contact us</p>

<p>Thankyou</p><br>

{{config('app.name')}}
@endcomponent