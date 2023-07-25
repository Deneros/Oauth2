<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'welcome_title',
        'welcome_description',
        'program_title',
        'program_description',
        'about_title',
        'about_description',
    ];
}
