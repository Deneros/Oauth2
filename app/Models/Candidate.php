<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'place_of_birth',
        'address',
        'phone',
        'type_candidate_id',
        'identification_type_id',
        'city_of_birth_id',
        'identification_number'

    ];

    public function typeCandidate()
    {
        return $this->belongsTo(TypeCandidate::class);
    }

    public function leaders()
    {
        return $this->belongsToMany(Leader::class, 'leader_candidate', 'candidate_id', 'leader_id')
            ->withTimestamps();
    }
}
