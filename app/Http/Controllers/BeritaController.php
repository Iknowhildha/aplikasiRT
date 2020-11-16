<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use App\komentar;
use Session;
use Illuminate\Support\Facades\Redirect;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Session::get('login')){
            toastr()->warning('Kamu harus login terlebih dahulu.');
            return redirect('login');
        }
        elseif(Session::get('level') == 'Admin'){
            $berita = Berita::paginate(10);
            return view('admin.berita.berita', compact('berita'));
        }else{
            $berita2 = Berita::take(2)->get();
            $beritaall = Berita::paginate(9);
            return view('warga.berita.berita', compact('berita2','beritaall'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Session::get('login')){
            toastr()->warning('Kamu harus login terlebih dahulu.');
            return redirect('login');
        }
        else{
            return view('admin.berita.tambah-berita');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Berita::create([
            'judul' => $request['judul'],
            'headline' => $request['headline'],
            'isi' => $request['isi'],
            'sumber' => $request['sumber'],
            'tanggal_berita' => $request['tanggal'],
            'user_id' => Session::get('id')
        ]);

        toastr()->success('Data berita berhasil ditambahkan');

        return redirect::to('admin/berita');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!Session::get('login')){
            toastr()->warning('Kamu harus login terlebih dahulu.');
            return redirect('login');
        }
        elseif(Session::get('level') == 'Admin'){
            $berita = Berita::findOrfail($id);
            $komentar = Komentar::where('berita_id',$id)->get();
            return view('admin.berita.detail-berita', compact('berita','komentar'));
        }else{
            $berita = Berita::findOrfail($id);
            $komentar = Komentar::where('berita_id',$id)->get();
            return view('warga.berita.detail-berita', compact('berita','komentar'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Session::get('login')){
            toastr()->warning('Kamu harus login terlebih dahulu.');
            return redirect('login');
        }
        elseif(Session::get('level') == 'Admin'){
            $berita = Berita::findOrfail($id);
            return view('admin.berita.edit-berita', compact('berita'));
        }else{
            $berita = berita::paginate(10);
            return view('warga.berita.berita', compact('berita'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $berita = Berita::where('id', $id)->firstOrFail();
        $berita->judul = $request->judul;
        $berita->headline = $request->headline;
        $berita->isi = $request->isi;
        $berita->sumber = $request->sumber;
        $berita->tanggal_berita = $request->tanggal;
        $berita->user_id = Session::get('id');

        $berita->update();
        toastr()->success('Data berita berhasil diedit');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::findOrfail($id);
        $berita->delete();
        toastr()->success('Data Sukses Dihapus.');
        return redirect::to('admin/berita');
    }
}
