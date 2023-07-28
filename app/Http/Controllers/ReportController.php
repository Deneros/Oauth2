<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormData;
use App\Models\Gender;
use App\Models\HousingType;
use App\Models\IdentificationType;
use App\Models\City;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReportExport;
use App\Models\Role;
use App\Models\Meeting;
use App\Models\Topic;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ReportController extends Controller
{

    protected $reportExport;

    public function __construct(ReportExport $reportExport)
    {
        $this->reportExport = $reportExport;
    }

    public function index(Request $request)
    {
        $formData = FormData::query();

        if ($request->filled('gender')) {
            $formData->where('gender_id', $request->input('gender'));
        }
        if ($request->filled('housing_type')) {
            $formData->where('housing_type_id', $request->input('housing_type'));
        }
        if ($request->filled('identification_type')) {
            $formData->where('identification_type_id', $request->input('identification_type'));
        }
        if ($request->filled('city_of_birth')) {
            $formData->where('city_of_birth_id', $request->input('city_of_birth'));
        }
        if ($request->filled('city_of_residence')) {
            $formData->where('place_of_residence_id', $request->input('city_of_residence'));
        }

        $genders = Gender::all();
        $housingTypes = HousingType::all();
        $identificationTypes = IdentificationType::all();
        $citiesOfBirth = City::all();
        $citiesOfResidence = City::all();

        $results = $formData->get();
        $totalResults = $results->count();

        $currentDate = now();
        $results->each(function ($result) use ($currentDate) {
            $result->age = Carbon::parse($result->date_of_birth)->diffInYears($currentDate);
        });

        if ($request->filled('has_children')) {
            $hasChildren = $request->input('has_children') === '1';
            $results = $results->filter(function ($result) use ($hasChildren) {
                return $result->has_children === $hasChildren;
            });
        }

        $results->each(function ($result) {
            $result->number_of_children = $result->children_count ?? 0;
        });


        return view('reports.index', compact('results', 'genders', 'housingTypes', 'identificationTypes', 'citiesOfBirth', 'citiesOfResidence', 'totalResults'));
    }

    public function generateExcel(Request $request)
    {
        $formData = FormData::query();

        if ($request->filled('gender')) {
            $formData->where('gender_id', $request->input('gender'));
        }
        if ($request->filled('housing_type')) {
            $formData->where('housing_type_id', $request->input('housing_type'));
        }
        if ($request->filled('identification_type')) {
            $formData->where('identification_type_id', $request->input('identification_type'));
        }
        if ($request->filled('city_of_birth')) {
            $formData->where('city_of_birth_id', $request->input('city_of_birth'));
        }
        if ($request->filled('city_of_residence')) {
            $formData->where('place_of_residence_id', $request->input('city_of_residence'));
        }

        $results = $formData->get();

        // dd($results);


        return Excel::download(new ReportExport($results), 'reporte.xlsx');
    }
}
