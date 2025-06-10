<?php

namespace App\Http\Controllers; 
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    // 1. Rādīt visu valstu sarakstu
    public function index()
    {
        $countries = Country::all();
        return view('countries.index', compact('countries'));
    }

    // 2. Rādīt veidlapu jaunas valsts izveidei
    public function create()
    {
        return view('countries.create');
    }

    // 3. Saglabāt jaunu valsti
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'area_km2' => 'required|numeric|between:0,99999999.99',
            'population' => 'required|integer|min:0',
        ]);

        Country::create($validated);

        return redirect()->route('countries.index')->with('success', 'Valsts izveidota.');
    }

    // 4. Rādīt vienas valsts datus (ar pilsētām)
    public function show(Country $country)
    {
        $country->load('cities');
        return view('countries.show', compact('country'));
    }

    // 5. Rādīt valsts rediģēšanas veidlapu
    public function edit(Country $country)
    {
        return view('countries.edit', compact('country'));
    }

    // 6. Atjaunināt valsti
    public function update(Request $request, Country $country)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'area_km2' => 'required|numeric|between:0,99999999.99',
            'population' => 'required|integer|min:0',
        ]);

        $country->update($validated);

        return redirect()->route('countries.show', $country)->with('success', 'Valsts atjaunināta.');
    }

    // 7. Dzēst valsti
    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()->route('countries.index')->with('success', 'Valsts dzēsta.');
    }
}
