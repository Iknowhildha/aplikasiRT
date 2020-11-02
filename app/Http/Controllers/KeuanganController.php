<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keuangan;
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
            return view('admin.keuangan.tambah-keuangan');
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
        $masuk = DB::table('keuangan')->sum('uang_masuk');
            $keluar = DB::table('keuangan')->sum('uang_keluar');
            $saldo = $masuk - $keluar;
        if($request['uangmasuk'] != 0){
         
            Keuangan::create([
                'tanggal_keuangan' => $request['tanggal'],
                'uraian' => $request['uraian'],
                'uang_masuk' => $request['uangmasuk'],
                'uang_keluar' => 0,
                'saldo' => $saldo + $request['uangmasuk'],
                'total' => $request['uangmasuk']
            ]);
        }elseif($request['uangkeluar'] != 0){
            
            Keuangan::create([
                'tanggal_keuangan' => $request['tanggal'],
                'uraian' => $request['uraian'],
                'uang_masuk' => 0,
                'uang_keluar' => $request['uangkeluar'],
                'saldo' => $saldo - $request['uangkeluar'],
                'total' => $request['uangkeluar']
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
        return view('admin.keuangan.edit-keuangan', compact('keuangan'));
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
        $masuk = DB::table('keuangan')->sum('uang_masuk');
        $keluar = DB::table('keuangan')->sum('uang_keluar');
        $saldo = $masuk - $keluar;
        //dikembalikan awal dulu dikurang saldo lama
        

        if($request->uangmasuk != 0){
            $keuangan->saldo = $request->uangmasuk;
            $keuangan->tanggal_keuangan = $request->tanggal;
            $keuangan->uraian = $request->uraian;
            $keuangan->uang_masuk = $request->uangmasuk;
            $keuangan->update();
            toastr()->success('Data Keuangan berhasil diedit');
            return redirect::to('admin/keuangan');
        }elseif($request->uangkeluar != 0){
            //dikurang dulu
            $saldoawal = $keuangan->saldo - $keuangan->uang_keluar;
            $keuangan->saldo = $saldo - $request->uangkeluar;
            $keuangan->tanggal_keuangan = $request->tanggal;
            $keuangan->uraian = $request->uraian;
            $keuangan->uang_keluar = $request->uangkeluar;
            $keuangan->update();
            toastr()->success('Data Keuangan berhasil diedit');
            return redirect::to('admin/keuangan');
        }elseif($request->uangkeluar != 0 && $request->uangmasuk != 0){
            $saldoawal = $keuangan->saldo - $request->uangkeluar - $request->uangmasuk;
            $keuangan->saldo = $saldoawal - $request->uangkeluar + $request->uangmasuk;
            $keuangan->tanggal_keuangan = $request->tanggal;
            $keuangan->uraian = $request->uraian;
            $keuangan->uang_masuk = $request->uangmasuk;
            $keuangan->uang_keluar = $request->uangkeluar;
            $keuangan->saldo = $keuangan->saldo - $request->uangkeluar + $request->uangmasuk;
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
     
    }
}
