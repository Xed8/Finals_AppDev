<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FitnessClass extends Model
{
    protected $fillable = ['name', 'level', 'duration', 'trainer'];
}