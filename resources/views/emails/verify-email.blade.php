@component('mail::message')
# VerifyEmail
 
You can Email Verify responsive !
 
@component('mail::button', ['url' => $url])
View VerifyEmail!!!
@endcomponent
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent