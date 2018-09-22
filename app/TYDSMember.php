<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TYDSMember extends Model
{
    protected $table = "tydsmembers";
    protected $fillable = [
      'name', 'student_id', 'tel', 'major', 'direction', 'class', 'gender'
    ];
}
