<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrowConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'day_temp', 'night_temp', 'day_humd', 'night_humd', 'lg_str_hour', 'lg_str_min', 'lg_str_medan', 'lg_dur_hours', 'lg_dur_mins', 'hourplus_mod'  
    ];
}