<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leader;
use App\Models\Candidate;

class LeaderController extends Controller
{
    public function index()
    {
        $leaders = Leader::all();
        // dd($leaders);
        return view('leaders.index', compact('leaders'));

    }

    public function showLeadersCandidates()
    {
        $leaders = Leader::all();
        $candidates = Candidate::all();

        return view('leaders.show_leaders_candidates', compact('leaders', 'candidates'));
    }

    public function store(Request $request)
    {
        // dd($request);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'city_of_birth' => 'required|exists:cities,id',
            // 'place_of_birth' => 'required|exists:cities,id',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'identification_type' => 'required|exists:identification_types,id',
            'identification_number' => 'required|string|max:255',
        ]);

        Leader::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'date_of_birth' => $request->input('date_of_birth'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'identification_type_id' => $request->input('identification_type'),
            'identification_number' => $request->input('identification_number'),
            'city_of_birth_id' => $request->input('city_of_birth'),
        ]);

        return redirect()->route('backstage.user')->with('success', 'Líder registrado exitosamente.');
    }

    public function saveLeadersCandidates(Request $request)
    {
        $request->validate([
            'leader_id' => 'required|exists:leaders,id',
            'candidate_id' => 'required|exists:candidates,id',
        ]);

        $leader = Leader::find($request->input('leader_id'));
        $candidate = Candidate::find($request->input('candidate_id'));

        $leader->candidates()->attach($candidate);

        return redirect()->back()->with('success', 'Candidate assigned successfully.');
    }

    public function removeCandidate(Leader $leader, Candidate $candidate)
    {
        $leader->candidates()->detach($candidate->id);
        return redirect()->route('backstage.references')->with('success', 'Candidato eliminado del líder exitosamente.');
    }
}
