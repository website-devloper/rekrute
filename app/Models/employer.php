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
}
