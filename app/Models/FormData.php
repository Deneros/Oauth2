<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormData extends Model
{
    use HasFactory;

    protected $fillable = [
        'identification_type',
        'identification_number',
        'first_name',
        'last_name',
        'gender',
        'date_of_birth',
        'birth_city',
        'nationality',
        'residence_address',
        'neighborhood',
        'residence_location',
        'phone_number',
        'email',
        'housing_type',
        'dependents_count',
        'has_children',
        'number_of_children',
        'children_living_with_you',
        'adult_children',
        'voted_congress_presidency_2022',
        'voted_mayor_governor_2019',
        'registered_in_dagua',
        'priority_topics',
        'user_id',
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topics()
    {
        return $this->belongsToMany(Topic::class);
    }

    public function leader()
    {
        return $this->belongsTo(Leader::class, 'leader_id');
    }

    public function cityOfBirth()
    {
        return $this->belongsTo(City::class, 'city_of_birth_id');
    }

    public function cityOfResidence()
    {
        return $this->belongsTo(City::class, 'place_of_residence_id');
    }

    public function identificationType()
    {
        return $this->belongsTo(IdentificationType::class, 'identification_type_id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function housingType()
    {
        return $this->belongsTo(HousingType::class, 'housing_type_id');
    }
}
