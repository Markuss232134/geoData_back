@extends('layout')

@section('title', 'Rediģēt valsti: ' . $country->name)

@section('content')
    <h1>Rediģēt valsti: {{ $country->name }}</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('countries.update', $country) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nosaukums</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $country->name) }}" maxlength="100" required>
        </div>

        <div class="mb-3">
            <label for="area_km2" class="form-label">Platība (km²)</label>
            <input type="number" step="0.01" class="form-control" id="area_km2" name="area_km2" value="{{ old('area_km2', $country->area_km2) }}" min="0" max="99999999.99" required>
        </div>

        <div class="mb-3">
            <label for="population" class="form-label">Iedzīvotāju skaits</label>
            <input type="number" class="form-control" id="population" name="population" value="{{ old('population', $country->population) }}" min="0" required>
        </div>

        <button type="submit" class="btn btn-primary">Saglabāt izmaiņas</button>
        <a href="{{ route('countries.show', $country) }}" class="btn btn-secondary">Atcelt</a>
    </form>
@endsection
