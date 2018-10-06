<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TYDSTeam extends Model
{
    protected $table = 'tyds_teams';
    protected $fillable = [
        'studentA_id', 'studentB_id', 'subject','level'
    ];

    public function tydsMember()
    {
        return $this->hasMany('App\TYDSMember', 'team');
    }

    public function tydsSubject()
    {
        return $this->belongsTo('App\TYDSSubject', 'subject' ,'subject');
    }
}
