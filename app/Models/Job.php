<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'employer_id', 'city', 'country', 
        'job_type', 'minimum_salary', 'maximum_salary', 
        'job_category', 'experience', 'job_responsabilities', 'requirements'
    ];

    public function employer()
    {
        return $this->belongsTo(employer::class);
    }

    public function applications()
    {
        return $this->hasMany(application::class);
    }
}
