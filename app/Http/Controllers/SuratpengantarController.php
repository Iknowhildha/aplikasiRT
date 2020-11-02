<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suratpengantar;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use DB;

class SuratpengantarController extends Controller
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
            $surat = Suratpengantar::orderby('id', 'DESC')->paginate(10);
            return view('admin.surat-pengantar.surat', compact('surat'));
        }else{
            $surat = Suratpengantar::where('user_id', Session::get('id'))->paginate(10);
            return view('warga.surat-pengantar.surat', compact('surat'));
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
            return view('warga.surat-pengantar.surat-tambah');
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
        Suratpengantar::create([
            'nomor_surat' => $request['nomor'],
            'tanggal' => $request['tanggal'],
            'status_perkawinan' => $request['status'],
            'pelayanan' => $request['pelayanan'],
            'pekerjaan' => $request['pekerjaan'],
            'user_id' => Session::get('id'),
            'status' => 'Belum Tervalidasi',
        ]);

        toastr()->success('Data surat berhasil ditambahkan');

        return redirect('suratpengantar');
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
        $surat = Suratpengantar::where('id', $id)->firstOrFail();
        return view('warga.surat-pengantar.edit-surat', compact('surat'));
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
        $surat = Suratpengantar::where('id', $id)->firstOrFail();
        $surat->nomor_surat = $request->nomor;
        $surat->tanggal = $request->tanggal;
        $surat->status_perkawinan = $request->status;
        $surat->pekerjaan = $request->pekerjaan;
        $surat->pelayanan = $request->pelayanan;
        $surat->update();
        toastr()->success('Data surat berhasil diedit');

        return redirect('suratpengantar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $surat = Suratpengantar::findOrfail($id);
        $surat->delete();
        toastr()->success('Data Sukses Dihapus.');
        return redirect('suratpengantar');
    }
}
