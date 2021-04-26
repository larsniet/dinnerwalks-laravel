@extends('emails.templates.default')

@section('content')
    <p>{{ $naam }}</p>
    <p>{{ $email }}</p>
    <p>{{ $datum }}</p>
    <p>{{ $kortingscode }}</p>
    <p>{{ $personen }}</p>
    <p>{{ $prijs }}</p>
    <p>{{ $url }}</p>
@endsection
