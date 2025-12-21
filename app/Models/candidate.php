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
}
