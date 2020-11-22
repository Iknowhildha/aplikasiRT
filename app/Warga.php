<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Warga extends Model
{
    protected $table = 'warga';

    protected $fillable = [
        'no_kk', 'nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'agama', 'jenis_kelamin', 'no_hp','alamat', 'kelurahan', 'kecamatan', 'kota', 'status', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }



}
