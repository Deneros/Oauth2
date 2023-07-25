<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'place_of_birth',
        'address',
        'phone',
        'identification_type_id',
        'city_of_birth_id',
        'identification_number'
    ];

    public function candidates()
    {
        return $this->belongsToMany(Candidate::class, 'leader_candidate', 'leader_id', 'candidate_id')
            ->withTimestamps();
    }

    public function formData()
    {
        return $this->hasMany(FormData::class, 'leader_id');
    }
}
