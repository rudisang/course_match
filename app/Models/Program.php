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
        'faculty',
        'description',
        'duration',
        'min_points',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('name', 'like', '%' . $search . '%')
               
            )
        );

        $query->when($filters['faculty'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('faculty', 'like', '%' . $search . '%')
               
            )
        );

    }

    public function requirements()
    {
        return $this->hasMany(ProgramRequirement::class);
    }
}
