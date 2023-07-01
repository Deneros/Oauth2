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
        'children_count',
        'children_live_with',
        'adult_children_count',
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
}
