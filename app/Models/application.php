<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class application extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'job_id',
        'resume',
        'cover_letter',
        'status',
        'notes'
    ];

    /**
     * Get the candidate that owns the application
     */
    public function candidate()
    {
        return $this->belongsTo(candidate::class);
    }

    /**
     * Get the job for this application
     */
    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    /**
     * Get applied time ago
     */
    public function getAppliedAtAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    /**
     * Get status badge color
     */
    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'pending' => 'warning',
            'reviewed' => 'info',
            'shortlisted' => 'primary',
            'accepted' => 'success',
            'rejected' => 'danger',
            default => 'secondary'
        };
    }

    /**
     * Get status icon
     */
    public function getStatusIconAttribute()
    {
        return match($this->status) {
            'pending' => 'fa-clock',
            'reviewed' => 'fa-eye',
            'shortlisted' => 'fa-star',
            'accepted' => 'fa-check-circle',
            'rejected' => 'fa-times-circle',
            default => 'fa-question-circle'
        };
    }
}
