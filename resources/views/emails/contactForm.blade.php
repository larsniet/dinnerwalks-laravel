@component('mail::message')
Een bericht van **{{ $naam }}**


**E-mail**: {{ $email }} <br>
**Bericht**: {{ $bericht }}


Met vriendelijke groet,<br>
De Website.
@endcomponent
