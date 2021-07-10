@component('mail::message')
<h2>Hi wandelaar!</h2>

<p>Hopelijk heb je een beetje zin in de wandeling, horeca <span style="text-transform: capitalize">{{ $plaats }}</span> kan in ieder geval niet wachten om jou te ontvangen! De wandeling die je hebt geboekt vindt plaats op {{ $datum }} en is voor {{ $personen }}
@if ($personen === 1)
persoon.
@else
personen.
@endif
Hierbij ontvang je de link naar het document met alle informatie.</p>

<p>Je loopt de wandeling zelfstandig, er is dus niemand van Dinnerwalks aanwezig. In verband met de openingstijden van de horeca kun je starten tussen 13:50 en 15:50. Zie het document voor verdere informatie!</p>

<p><b>JOUW UNIEKE CODE:</b></p>
<h3>{{ $kortingscode }}</h3>

<p><b>LINK NAAR HET DOCUMENT MET INFO:</b></p>
<p>{{ $url }}</p>

<p><b>SPELLETJES (bij een cocktail walk)</b></p>
<p>Als extraatje heb je de mogelijkheid om spelletjes te spelen tijdens het nuttigen van de cocktails. Deze vind je onderaan het document!</p>

<p><b>LET OP:</b></p>
<p>Vergeet geen oortjes mee te nemen als je tijdens de wandeling naar onze podcast wil luisteren! Ook kan je het document met de route eventueel uitprinten.</p>

<p><b>Noodgevallen</b></p>
<p>Mochten er dingen niet duidelijk zijn kan je ons altijd per mail bereiken. Bij noodgevallen kan je bellen naar: <a href="tel:0631369911">06-31369911</a></p>

<p>We zijn super benieuwd wat jullie van onze wandeling vinden en krijgen graag feedback en fotootjes van jullie doorgestuurd. Laat ons dus vooral weten wat je vond en vergeet ons niet te taggen op social media wanneer je een fotootje plaatst (#dinnerwalks & @dinnerwalks).</p>

<p>Dan rest ons niks anders dan je heel veel plezier te wensen tijdens deze editie van Dinnerwalks. Geniet, beweeg en support horeca Leiden!</p>

<p>Liefs,<br />
Dinnerwalks</p>
@endcomponent
