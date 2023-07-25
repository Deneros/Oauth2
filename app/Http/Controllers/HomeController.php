<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeInfo;

class HomeController extends Controller
{
    public function index()
    {
        $homeInfo = HomeInfo::first();

        return view('home.home', compact('homeInfo'));
    }

    public function showPersonalizationForm()
    {
        $homeInfo = HomeInfo::first();

        return view('personalization.home', compact('homeInfo'));
    }

    public function updatePersonalization(Request $request)
    {

        $request->validate([
            'welcome_title' => 'required|string',
            'welcome_description' => 'required|string',
            'program_title' => 'required|string',
            'program_description' => 'required|string',
            'about_title' => 'required|string',
            'about_description' => 'required|string',
        ]);

        $homeInfo = HomeInfo::firstOrNew();

        $homeInfo->welcome_title = $request->input('welcome_title');
        $homeInfo->welcome_description = $request->input('welcome_description');
        $homeInfo->program_title = $request->input('program_title');
        $homeInfo->program_description = $request->input('program_description');
        $homeInfo->about_title = $request->input('about_title');
        $homeInfo->about_description = $request->input('about_description');

        $homeInfo->save();

        return redirect()->route('personalization.home')->with('success', 'La información del home se ha actualizado correctamente.');
    }
}
