<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    protected $fillable=['firstname','lastname','age','phone_number','email'];
}
