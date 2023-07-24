<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;

class CandidateController extends Controller
{
    public function store(Request $request)
    {
        // dd($request);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            // 'place_of_birth' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'identification_type' => 'required|exists:identification_types,id',
            'identification_number' => 'required|string|max:255',
            'type_candidate_id' => 'required|exists:type_candidates,id',
            'city_of_birth' => 'required|exists:cities,id',
        ]);

        Candidate::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'date_of_birth' => $request->input('date_of_birth'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'identification_type_id' => $request->input('identification_type'),
            'identification_number' => $request->input('identification_number'),
            'type_candidate_id' => $request->input('type_candidate_id'),
            'city_of_birth_id' => $request->input('city_of_birth'),
        ]);

        return redirect()->route('home.index')->with('success', 'Candidato registrado exitosamente.');
    }
}
