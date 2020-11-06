<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';

    protected $fillable = [
        'judul', 'headline', 'isi', 'sumber','tanggal_berita','user_id'
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
