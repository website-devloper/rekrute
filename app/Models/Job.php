<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'job_type',
        'job_category',
        'experience',
        'minimum_salary',
        'maximum_salary',
        'city',
        'country',
        'description',
        'job_responsabilities',
        'requirements',
        'employer_id',
        'status'
    ];

    protected $casts = [
        'minimum_salary' => 'decimal:2',
        'maximum_salary' => 'decimal:2',
    ];

    /**
     * Get the employer that owns the job
     */
    public function employer()
    {
        return $this->belongsTo(employer::class);
    }

    /**
     * Get all applications for this job
     */
    public function applications()
    {
        return $this->hasMany(application::class);
    }

    /**
     * Get the time ago attribute
     */
    public function getTimeAgoAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    /**
     * Scope for active jobs
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Get formatted salary range
     */
    public function getSalaryRangeAttribute()
    {
        return number_format($this->minimum_salary) . ' - ' . number_format($this->maximum_salary) . ' DH';
    }
}
