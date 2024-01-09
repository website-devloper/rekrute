<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employer extends Model
{
    protected $fillable=['name','password','Established_In','type','logo_url','website_url','city','street','zip_code','country','phone','email_adress','company_bg','service','Expertise'];
    use HasFactory;
}
