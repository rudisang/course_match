<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'degree',
        'name',
        'type',
        'description',
        'duration',
        'min_points',
    ];

    public function requirements()
    {
        return $this->hasMany(ProgramRequirement::class);
    }
}
