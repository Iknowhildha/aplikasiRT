<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $table = 'inventaris';

    protected $fillable = [
        'nama_inventaris', 'jumlah', 'satuan', 'tanggal_beli', 'keterangan_inventaris','user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
