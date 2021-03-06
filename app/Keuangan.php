<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $table = 'keuangan';

    protected $fillable = [
        'tanggal_keuangan', 'uraian', 'uang_masuk', 'uang_keluar','user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
