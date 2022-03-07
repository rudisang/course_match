<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramRequirement extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'subject',
        'min_points',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
