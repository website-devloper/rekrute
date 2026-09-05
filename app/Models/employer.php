<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class employer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Specify custom column for authentication if needed in older Laravel, but mostly handled in controller credential array
    
    protected $fillable=['name','password','Established_In','type','logo_url','website_url','city','street','zip_code','country','phone','email_adress','company_bg','service','Expertise'];

    protected $hidden = [
        'password',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    /**
     * Company logo URL. New uploads are absolute Vercel Blob URLs; older rows
     * hold a bare filename that lived in public/image.
     */
    public function getLogoAttribute(): ?string
    {
        if (! $this->logo_url) {
            return null;
        }

        return str_starts_with($this->logo_url, 'http')
            ? $this->logo_url
            : asset('image/'.$this->logo_url);
    }

    protected static function newFactory()
    {
        return \Database\Factories\EmployerFactory::new();
    }
}
