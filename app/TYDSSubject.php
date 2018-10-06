<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TYDSSubject extends Model
{
    protected $table = 'tyds_subjects';
    protected $fillable = ['subjuct', 'count' , 'level'];

    public function tydsTeam()
    {
        return $this->hasMany('App\TYDSTeam', 'subject', 'subject');
    }

    public function tydsMember()
    {
        return $this->hasMany('App\TYDSMember', 'subject', 'subject');
    }
}
