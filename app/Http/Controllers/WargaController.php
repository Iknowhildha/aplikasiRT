<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Warga;
use DB;

class WargaController extends Controller
{
    public function beranda(){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu harus login dulu');
        }
        elseif(Session::get('level') == 'Warga'){
            return view('warga.beranda');
        }else{
            return redirect('admin.beranda');
        }
    }

    public function warga1() {
        $warga = Warga::where('status','Confirmed')->paginate(10);
        return view('warga.warga.warga', compact('warga'));
        }

    public function warga() {
        $warga = DB::table('warga')
        ->leftJoin('users', 'warga.user_id', '=', 'users.id')
        ->where('users.level','Warga')
        ->orderBy('users.id', 'DESC')
        ->paginate(10);
        return view('warga.warga.warga', compact('warga'));
        }
        public function detailProfil($id) {
            $warga = Warga::where('user_id', $id)->firstOrFail();
            return view('warga.warga.detailprofil', compact('warga'));
        }
    
        public function detail($id) {
            
            $warga = Warga::where('user_id', $id)->firstOrFail();
            return view('warga.warga.detail', compact('warga'));
        }
    
        public function editProfil($id) {
        $warga = Warga::where('user_id', $id)->firstOrFail();
        return view('warga.warga.edit', compact('warga'));
    
        }
    
        public function updateProfil(Request $request, $id) {
      
            $warga = Warga::where('user_id', $id)->firstOrFail();
            $warga->no_kk = $request->no_kk;
            $warga->nik = $request->nik;
            $warga->nama = $request->nama;
            $warga->tempat_lahir = $request->tempat_lahir;
            $warga->tanggal_lahir = $request->tanggal_lahir;
            $warga->agama = $request->agama;
            $warga->jenis_kelamin = $request->jenis_kelamin;
            $warga->no_hp = $request->no_hp;
            $warga->alamat = $request->alamat;
            $warga->update();
            toastr()->success('Data Sukses Diedit.');

            return view('warga.warga.edit', compact('warga'));
            
        }
    
        public function deleteWarga($id) {
            $warga = User::findOrfail($id);
            $warga->delete();
            toastr()->success('Data Sukses Dihapus.');
            return redirect('warga');
        }
}
