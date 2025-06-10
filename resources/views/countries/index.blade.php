@extends('layout')

@section('title', 'Visas valstis')

@section('content')
    <h1>Valstu saraksts</h1>

    @if($countries->isEmpty())
        <p>Valstu nav.</p>
    @else
        <ul>
            @foreach($countries as $country)
                <li>
                    <a href="{{ route('countries.show', $country) }}">{{ $country->name }}</a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
