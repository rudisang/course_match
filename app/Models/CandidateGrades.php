<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateGrades extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject',
        'grade',
        'points',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
