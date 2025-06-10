@extends('layout')

@section('title', $country->name)

@section('content')
    <h1>{{ $country->name }}</h1>

    <p><strong>Platība:</strong> {{ number_format($country->area_km2, 2, ',', ' ') }} km²</p>
    <p><strong>Iedzīvotāju skaits:</strong> {{ number_format($country->population, 0, ',', ' ') }}</p>

    <h3>Pilsētas</h3>
    @if($country->cities->isEmpty())
        <p>Šai valstij pilsētas nav.</p>
    @else
        <ul>
            @foreach($country->cities as $city)
                <li>{{ $city->name }}</li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('countries.edit', $country) }}" class="btn btn-primary">Rediģēt valsti</a>

    <form action="{{ route('countries.destroy', $country) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Vai tiešām dzēst šo valsti?');">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Dzēst valsti</button>
    </form>

    <p><a href="{{ route('countries.index') }}">Atpakaļ uz valstu sarakstu</a></p>
@endsection
