@component('mail::message')
# Hlw {{ $user->name}}

Your Account is Ready. Plesse Take one More Step and Activve Your Account. Click The Button

@component('mail::button', ['url' =>  route('confirmation', $user->token)])
Confirm
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
