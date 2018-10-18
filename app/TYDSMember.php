<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TYDSMember extends Model
{
    protected $table = "tydsmembers";
    protected $fillable = [
      'name', 'student_id', 'tel', 'major', 'direction', 'class', 'gender', 'team' ,'level','subject'
    ];

    public function tydsTeam()
    {
        return $this->belongsTo('App\TYDSTeam', 'team');
    }

    public function tydsSubject()
    {
        return $this->belongsTo('App\TYDSSubject', 'subject', 'subject');
    }
}
