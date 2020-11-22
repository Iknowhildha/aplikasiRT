<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Suratpengantar extends Model
{
    protected $table = 'surat_pengantar';

    protected $fillable = [
        'nomor_surat', 'tanggal', 'status_perkawinan', 'pekerjaan','pelayanan','user_id','status'
    ];
    

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
