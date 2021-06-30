@component('mail::message')
<h1>
Uw bedrijf <a href="{{ $link }}">{{ $companyName }}</a> is aangemeld bij Dinnerwalks!
</h1>
<h2>
Locatie
</h2>
<p>
{{ $location }}
</p>
<h2>
E-mail
</h2>
<p>
{{ $email }}
</p>
<h2>
Persoonlijk wachtwoord
</h2>
<p>
{{ $password }}
</p>

<h2>
Wat moet ik met deze gegevens?
</h2>
<p>
Het belangrijkste is dat je deze gegevens niet kwijtraakt! Hiermee kan je
namelijk inloggen op <a href="https://admin.dinnerwalks.nl/"
style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #3869d4;">het
adminpanel van Dinnerwalks</a>, hier staan alle codes die voor jouw
onderneming van belang zijn. Aangezien we elke week andere codes (namen van vissen) gebruiken, worden de kortingscodes dus wekelijks geüpdate. Dit adminpanel is
bedoeld om makkelijk te kunnen checken hoeveel mensen op pad gaan/zijn en
welke code ze van ons hebben gekregen.</p>

<p>
Super leuk dat {{ $companyName }} zich heeft aangesloten bij Dinnerwalks en
we hopen dat jullie er nog veel profijt van zullen hebben!</p>

<p style="font-size: 14px">
Het is mogelijk om je wachtwoord te veranderen, dit wordt alleen niet
aangeraden in verband met veiligheidsredenen. Ook wordt het aangeraden om
twee factor authenticatie aan te zetten om te voorkomen dat gevoelige data
gaat lekken. Uiteraard zijn wij goed beveiligd en versturen we zo min
mogelijk gevoelige informatie :).</p>

@endcomponent

