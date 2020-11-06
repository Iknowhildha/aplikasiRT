<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentar';

    protected $fillable = [
        'isi_komentar', 'tanggal_komentar', 'user_id', 'berita_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function berita()
    {
        return $this->belongsTo('App\Berita');
    }
}
