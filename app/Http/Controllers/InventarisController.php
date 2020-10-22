<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventaris;
use Illuminate\Support\Facades\Session;

class InventarisController extends Controller
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
        else{
            $inventaris = Inventaris::paginate(10);
            return view('adminwarga.inventaris.inventaris', compact('inventaris'));
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
            return view('adminwarga.inventaris.tambah-inventaris');
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
        Inventaris::create([
            'nama_inventaris' => $request['nama'],
            'jumlah' => $request['jumlah'],
            'satuan' => $request['satuan'],
            'tanggal_beli' => $request['tanggal_beli'],
            'keterangan_inventaris' => $request['keterangan'],
            'user_id' => Session::get('id')
        ]);

        toastr()->success('Data inventaris berhasil ditambahkan');

        return redirect('inventaris');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventaris = Inventaris::where('id', $id)->firstOrFail();
        return view('adminwarga.inventaris.detail-inventaris', compact('inventaris'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventaris = Inventaris::where('id', $id)->firstOrFail();
        return view('adminwarga.inventaris.edit-inventaris', compact('inventaris'));
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
        $inventaris = Inventaris::where('id', $id)->firstOrFail();
        $inventaris->nama_inventaris = $request->nama;
        $inventaris->jumlah = $request->jumlah;
        $inventaris->satuan = $request->satuan;
        $inventaris->tanggal_beli = $request->tanggal_beli;
        $inventaris->keterangan_inventaris = $request->keterangan;
        $inventaris->user_id = Session::get('id');
        $inventaris->update();
        toastr()->success('Data inventaris berhasil diedit');

        return redirect('inventaris');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventaris = Inventaris::findOrfail($id);
        $inventaris->delete();
        toastr()->success('Data Sukses Dihapus.');
        return redirect('inventaris');
    }
}
