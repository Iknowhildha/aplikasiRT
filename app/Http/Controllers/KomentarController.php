<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Komentar;
use Session;
use Redirect;

class KomentarController extends Controller
{
    public function komenadmin(Request $request, $id)
    {
        Komentar::create([
            'isi_komentar' => $request['komentar'],
            'tanggal_komentar' => date('Y-m-d'),
            'berita_id' => $id,
            'user_id' => Session::get('id')
        ]);

        toastr()->success('Data Komentar berhasil ditambahkan');

        return redirect()->back();
    }
}
