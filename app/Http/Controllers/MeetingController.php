<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meeting;
use App\Models\Leader;
use App\Models\FormData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Models\User;

class MeetingController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $meetings = $user->meetings()->get();
        $leaders = Leader::all()->map(function ($leader) {
            return [
                'id' => $leader->id,
                'name' => $leader->first_name . ' ' . $leader->last_name,
            ];
        })->pluck('name', 'id');

        return view('meetings.meetings', compact('meetings', 'leaders'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'date_meeting' => 'required|date',
            'location' => 'required|string',
            'leader' => 'required|exists:leaders,id',
        ]);

        $meeting = new Meeting();
        $meeting->title = $request->input('title');
        $meeting->description = $request->input('description');
        $meeting->date_meeting = $request->input('date_meeting');
        $meeting->location = $request->input('location');
        $meeting->save();

        $leader_id = $request->input('leader');

        $formData = FormData::where('leader_id', $leader_id)->get();
        $related_users = $formData->pluck('user_id')->toArray();

        $meeting->users()->attach($related_users);
        $meeting->users()->attach($leader_id, ['leader_id' => $leader_id]);

        return redirect()->route('meetings.index')->with('success', 'La reunión ha sido creada exitosamente.');
    }

    public function markCompleted(Meeting $meeting)
    {
        $meeting->completed = true;
        $meeting->save();

        return redirect()->route('meetings.index')->with('success', 'La reunión se ha marcado como completada.');
    }

    public function attachDocument(Request $request, Meeting $meeting)
    {
        $request->validate([
            'document' => 'required|file',
        ]);

        $meeting->document_path = $request->file('document')->store('documents');
        $meeting->save();

        $meeting->completed = true;
        $meeting->save();

        return redirect()->route('meetings.index')->with('success', 'El documento ha sido adjuntado y la reunión se ha marcado como completada.');
    }

    public function downloadDocument($id)
    {
        $meeting = Meeting::findOrFail($id);

        if ($meeting->document_path) {
            $path = storage_path('app/' . $meeting->document_path);
            return response()->download($path);
        } else {
            // Manejar el caso en el que el archivo no esté adjunto
            // Puedes redirigir o mostrar un mensaje de error
        }
    }

    public function show($id)
    {
        //
    }


    public function edit(Meeting $meeting)
    {
        return view('meetings.edit', compact('meeting'));
    }

    public function update(Request $request, Meeting $meeting)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'location' => 'required|string',
            'date_meeting' => 'required|date_format:Y-m-d\TH:i',
        ]);

        $meeting->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'location' => $request->input('location'),
            'date_meeting' => $request->input('date_meeting'),
        ]);

        return redirect()->route('meetings.index')->with('success', 'La reunión se ha actualizado correctamente.');
    }
    public function destroy($id)
    {
        //
    }
}
