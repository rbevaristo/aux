@component('mail::message')
# Verify Account

Click on the button below to verify your account.

@component('mail::button', ['url' => 'http://localhost:4200/user/verify?token='.$token.'&email='.$email])
Verify
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent