<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class candidate extends Model
{
    protected $fillable=['first_name','last_name','job_title','price_wish','email','gender','city','street','zip_code','country','phone','about','img_url','resume','password'];
    use HasFactory;
}
