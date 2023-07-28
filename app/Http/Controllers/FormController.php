<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FormData;
use App\Models\Gender;
use App\Models\IdentificationType;
use App\Models\HousingType;
use App\Models\City;
use App\Models\Leader;



class FormController extends Controller
{
    public function __invoke()
    {
    }

    public function index()
    {
        $genders = Gender::pluck('name', 'id');
        $housingTypes = HousingType::pluck('name', 'id');
        $cities = City::orderBy('name')->pluck('name', 'id');
        $leaders = Leader::all()->map(function ($leader) {
            return [
                'id' => $leader->id,
                'name' => $leader->first_name . ' ' . $leader->last_name,
            ];
        })->pluck('name', 'id');

        return view('form.index', compact('genders', 'housingTypes', 'cities', 'leaders'));
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'date_of_birth' => 'required|date',
            'birth_city' => 'required|numeric',
            'nationality' => 'required|string',
            'residence_address' => 'required|string',
            'gender' => 'required|numeric',
            'housing_type' => 'required|numeric',
            'neighborhood' => 'required|string',
            'polling_place' => 'required|string',
            'polling_address' => 'required|string',
            'polling_station' => 'required|string',
            'residence_location' => 'required|numeric',
            'phone_number' => 'required|string',
            'dependents_count' => 'required|numeric',
            'registered_in_dagua' => 'required|numeric',
            'elections_2022' => 'required|boolean',
            'elections_2019' => 'required|boolean',
            'children' => 'required|boolean',
            'children_count' => 'required_if:children,1|nullable|numeric',
            'children_live_with' => 'required_if:children,1|nullable|numeric',
            'adult_children' => 'required_if:children,1|nullable|numeric',
            'leader' => 'nullable|exists:leaders,id',
            'topics' => 'required|array|min:3',
            // 'topics.*' => 'in:Desarrollo de la Agricultura,Desarrollo de la Minería,Economía,Emprendimiento,Seguridad,Crear oportunidades de Empleo,Educación,Salud,Recreación,Turismo', 

        ]);


        $user_id = Auth::id();
        $existing_user = FormData::where('user_id', $user_id)->first();

        if ($existing_user) {
            return redirect()->route('form.index')->with('warning', 'Usted ya ha realizo la encuesta previamente.');
        }

        // dd($validated_data);

        $form_data = new FormData();
        $form_data->user_id = $user_id;
        $form_data->gender_id = $validated_data['gender'];
        $form_data->housing_type_id  = $validated_data['housing_type'];
        $form_data->date_of_birth = date('Y-m-d', strtotime($validated_data['date_of_birth']));
        $form_data->city_of_birth_id = $request->input('birth_city');
        $form_data->nationality = $validated_data['nationality'];
        $form_data->residence_address = $validated_data['residence_address'];
        $form_data->neighborhood = $validated_data['neighborhood'];
        $form_data->place_of_residence_id = $request->input('residence_location');
        $form_data->cellphone = $validated_data['phone_number'];

        $form_data->polling_place = $validated_data['polling_place'];
        $form_data->polling_address = $validated_data['polling_address'];
        $form_data->polling_station = $validated_data['polling_station'];

        $form_data->dependents = $validated_data['dependents_count'];
        $form_data->has_children = $validated_data['children'];

        if ($validated_data['children']) {
            $form_data->number_of_children = $request->input('children_count');
            $form_data->children_living_with_you = $request->input('children_live_with');
            $form_data->adult_children = $request->input('adult_children');
        }

        $form_data->voted_2022_congress_presidency = $request->input('elections_2022');
        $form_data->voted_2019_mayor_governor = $request->input('elections_2019');
        $form_data->registered_in_dagua = $request->input('registered_in_dagua');
        $form_data->leader_id = $request->input('leader');;
        $form_data->save();

        $topics = $request->input('topics');
        $form_data->topics()->attach($topics);

        return redirect()->route('form.index')->with('success', 'El formulario fue guardado correctamente');
    }

    public function edit($id)
    {
        $form_data = FormData::findOrFail($id);
        $genders = Gender::pluck('name', 'id');
        $identificationTypes = IdentificationType::pluck('name', 'id');
        $housingTypes = HousingType::pluck('name', 'id');
        $cities = City::orderBy('name')->pluck('name', 'id');
        $leaders = Leader::all()->map(function ($leader) {
            return [
                'id' => $leader->id,
                'name' => $leader->first_name . ' ' . $leader->last_name,
            ];
        })->pluck('name', 'id');

        // dd($form_data ->identification_number);

        return view('form.edit', compact('genders', 'identificationTypes', 'housingTypes', 'cities', 'leaders', 'form_data'));
    }

    public function update(Request $request, $id)
    {

        $validated_data = $request->validate([
            'date_of_birth' => 'required|date',
            'birth_city' => 'required|numeric',
            'nationality' => 'required|string',
            'residence_address' => 'required|string',
            'gender' => 'required|numeric',
            'housing_type' => 'required|numeric',
            'neighborhood' => 'required|string',
            'polling_place' => 'required|string',
            'polling_address' => 'required|string',
            'polling_station' => 'required|string',
            'residence_location' => 'required|numeric',
            'phone_number' => 'required|string',
            'dependents_count' => 'required|numeric',
            'registered_in_dagua' => 'required|numeric',
            'elections_2022' => 'required|boolean',
            'elections_2019' => 'required|boolean',
            'children' => 'required|boolean',
            'children_count' => 'required_if:children,1|nullable|numeric',
            'children_live_with' => 'required_if:children,1|nullable|numeric',
            'adult_children' => 'required_if:children,1|nullable|numeric',
            'leader' => 'nullable|exists:leaders,id',
            'topics' => 'required|array|min:3',
            // 'topics.*' => 'in:Desarrollo de la Agricultura,Desarrollo de la Minería,Economía,Emprendimiento,Seguridad,Crear oportunidades de Empleo,Educación,Salud,Recreación,Turismo', 
        ]);

        $form_data = FormData::findOrFail($id);

        $form_data->gender_id = $validated_data['gender'];
        $form_data->housing_type_id  = $validated_data['housing_type'];
        $form_data->date_of_birth = date('Y-m-d', strtotime($validated_data['date_of_birth']));
        $form_data->city_of_birth_id = $request->input('birth_city');
        $form_data->nationality = $validated_data['nationality'];
        $form_data->residence_address = $validated_data['residence_address'];
        $form_data->neighborhood = $validated_data['neighborhood'];
        $form_data->place_of_residence_id = $request->input('residence_location');
        $form_data->cellphone = $validated_data['phone_number'];

        $form_data->polling_place = $validated_data['polling_place'];
        $form_data->polling_address = $validated_data['polling_address'];
        $form_data->polling_station = $validated_data['polling_station'];

        $form_data->dependents = $validated_data['dependents_count'];
        $form_data->has_children = $validated_data['children'];

        if ($validated_data['children']) {
            $form_data->number_of_children = $request->input('children_count');
            $form_data->children_living_with_you = $request->input('children_live_with');
            $form_data->adult_children = $request->input('adult_children');
        }

        $form_data->voted_2022_congress_presidency = $request->input('elections_2022');
        $form_data->voted_2019_mayor_governor = $request->input('elections_2019');
        $form_data->registered_in_dagua = $request->input('registered_in_dagua');
        $form_data->leader_id = $request->input('leader');;
        $form_data->save();

        $topics = $request->input('topics');
        $form_data->topics()->attach($topics);
    }
}
