<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meeting;
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

        return view('meetings.meetings', compact('meetings'));
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
        ]);

        $meeting = new Meeting();
        $meeting->title = $request->input('title');
        $meeting->description = $request->input('description');
        $meeting->date_meeting = $request->input('date_meeting');
        $meeting->location = $request->input('location');
        $meeting->save();

        $user = Auth::user();
        $related_users = DB::table('form_data')
            ->join('users', 'form_data.user_id', '=', 'users.id')
            ->where('form_data.moderator_id', $user->id)
            ->pluck('users.id')
            ->toArray();

        $related_users[] = $user->id;

        $meeting->users()->attach($related_users);

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


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
