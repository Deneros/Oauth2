<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FormData;


class FormController extends Controller
{
    public function index()
    {
        return view('form.index');
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'identification_number' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'date_of_birth' => 'required|date',
            'birth_city' => 'required|string',
            'nationality' => 'required|string',
            'residence_address' => 'required|string',
            'neighborhood' => 'required|string',
            'residence_location' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|string|email',
            'has_children' => 'required|boolean',
        ]);

        $user_id = Auth::id();

        $form_data = new FormData();

        $form_data->user_id = $user_id;
        $form_data->identification_number = $validated_data['identification_number'];
        $form_data->first_name = $validated_data['first_name'];
        $form_data->last_name = $validated_data['last_name'];
        $form_data->date_of_birth = $validated_data['date_of_birth'];
        $form_data->birth_city = $validated_data['birth_city'];
        $form_data->nationality = $validated_data['nationality'];
        $form_data->residence_address = $validated_data['residence_address'];
        $form_data->neighborhood = $validated_data['neighborhood'];
        $form_data->residence_location = $validated_data['residence_location'];
        $form_data->phone_number = $validated_data['phone_number'];
        $form_data->email = $validated_data['email'];
        $form_data->has_children = $validated_data['has_children'];

        if ($validated_data['has_children']) {
            $form_data->children_count = $request->input('children_count');
            $form_data->children_live_with = $request->input('children_live_with');
            $form_data->adult_children_count = $request->input('adult_children_count');
        }

        $form_data->voted_congress_presidency_2022 = $request->input('voted_congress_presidency_2022');
        $form_data->voted_mayor_governor_2019 = $request->input('voted_mayor_governor_2019');

        $form_data->registered_in_dagua = $request->input('registered_in_dagua');

        $form_data->save();

        return redirect()->route('formulario.index')->with('success', 'The form has been submitted successfully.');
    }
}
