<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class candidate extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable=['first_name','last_name','job_title','price_wish','email','gender','city','street','zip_code','country','phone','about','img_url','resume','password'];

    protected $hidden = [
        'password',
    ];

    public function applications()
    {
        return $this->hasMany(application::class);
    }

    /**
     * Profile picture URL. New uploads are absolute Vercel Blob URLs; older
     * rows hold a relative path on the public disk.
     */
    public function getPhotoUrlAttribute(): ?string
    {
        return $this->resolveUploadUrl($this->img_url, 'storage/');
    }

    /**
     * Resume URL, same relative/absolute handling as the profile picture.
     */
    public function getResumeUrlAttribute(): ?string
    {
        return $this->resolveUploadUrl($this->resume, 'storage/');
    }

    protected function resolveUploadUrl(?string $value, string $legacyPrefix): ?string
    {
        if (! $value) {
            return null;
        }

        return str_starts_with($value, 'http') ? $value : asset($legacyPrefix.$value);
    }

    protected static function newFactory()
    {
        return \Database\Factories\CandidateFactory::new();
    }
}
