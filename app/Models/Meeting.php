<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'moderator_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'meeting_user')->withTimestamps();
    }

    public function moderator()
    {
        return $this->belongsTo(User::class, 'moderator_id');
    }
}
