<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ttd;
use Session;

class TtdController extends Controller
{
    public function formttd()
    {
		$data = Ttd::first();
        return view('admin.surat-pengantar.ttd',compact('data'));
    }

    public function simpanttd(Request $request, $id)
    {
		$ttd = Ttd::findOrFail($id);
		$ttd->nama = $request->nama;
		$image = $request->file('file');
		if ($image) {
			$image_name = date('dmy_H_s_i');
			$ext = strtolower($image->getClientOriginalExtension());
			$imagefull = $image_name.'.'.$ext;
			$lokasi = 'img/foto/';
			$success = $image->move($lokasi,$imagefull);
			$ttd->foto = $imagefull;			
		}
		$ttd->user_id = Session::get('id');
        $ttd->update();
        toastr()->success('Sukses!', 'Data berhasil diupdate');
		return redirect('admin/suratpengantar');
    }
}
