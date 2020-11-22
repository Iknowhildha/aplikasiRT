<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ttd extends Model
{
    protected $table = 'ttd';

    protected $fillable = [
        'nama', 'foto', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
