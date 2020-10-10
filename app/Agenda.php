<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda';

    protected $fillable = [
        'nama_agenda', 'isi_agenda', 'tanggal_agenda', 'tempat_agenda', 'keterangan_agenda','user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
