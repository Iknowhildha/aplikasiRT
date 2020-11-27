<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keuangan;
use App\Warga;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use DB;

class KeuanganController extends Controller
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
        elseif(Session::get('level') != "Warga"){
            $keuangan = Keuangan::orderby('id', 'DESC')->paginate(10);
            return view('admin.keuangan.keuangan', compact('keuangan'));
        }else{
            $keuangan = Keuangan::orderby('id', 'DESC')->paginate(10);
            return view('warga.keuangan.keuangan', compact('keuangan'));
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
            $user = Warga::all();
            return view('admin.keuangan.tambah-keuangan', compact('user'));
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
 
        if($request['jenis'] == 'uangmasuk'){
            Keuangan::create([
                'tanggal_keuangan' => $request['tanggal'],
                'uraian' => $request['uraian'],
                'user_id' => $request['tanggung'],
                'uang_masuk' => $request['nominal'],
                'uang_keluar' => 0,
            ]);
        }elseif($request['jenis'] == 'uangkeluar'){
            Keuangan::create([
                'tanggal_keuangan' => $request['tanggal'],
                'uraian' => $request['uraian'],
                'user_id' => $request['tanggung'],
                'uang_masuk' => 0,
                'uang_keluar' => $request['nominal'],
            ]);
        }


        toastr()->success('Data Keuangan berhasil ditambahkan');

        return redirect::to('admin/keuangan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $keuangan = Keuangan::where('id', $id)->firstOrFail();
        $user = Warga::all();
        return view('admin.keuangan.edit-keuangan', compact('keuangan','user'));
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
        $keuangan = Keuangan::where('id', $id)->firstOrFail();
        if($request->jenis == 'uangmasuk'){
            $keuangan->tanggal_keuangan = $request->tanggal;
            $keuangan->uraian = $request->uraian;
            $keuangan->uang_masuk = $request->nominal;
            $keuangan->user_id = $request->tanggung;
            $keuangan->uang_keluar = 0;
            $keuangan->update();
            toastr()->success('Data Keuangan berhasil diedit');
            return redirect::to('admin/keuangan');
        }elseif($request->jenis == 'uangkeluar'){
            $keuangan->tanggal_keuangan = $request->tanggal;
            $keuangan->uraian = $request->uraian;
            $keuangan->uang_keluar = $request->nominal;
            $keuangan->user_id = $request->tanggung;
            $keuangan->uang_masuk = 0;
            $keuangan->update();
            toastr()->success('Data Keuangan berhasil diedit');
            return redirect::to('admin/keuangan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keuangan = Keuangan::findOrfail($id);
        $keuangan->delete();
        toastr()->success('Data Sukses Dihapus.');
        return redirect::to('admin/keuangan');
    }
}
