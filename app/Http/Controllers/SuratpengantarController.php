<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suratpengantar;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use DB;
use PDF;
use App\Warga;
use App\Ttd;

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
        }else{
            $AWAL = '419.72.02.06.42';
            // karna array dimulai dari 0 maka kita tambah di awal data kosong
            // bisa juga mulai dari "1"=>"I"
            $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
            $noUrutAkhir = \App\Suratpengantar::max('nomor_surat');
            $no = 1;
            if($noUrutAkhir) {
                $nomorotomatis =  sprintf("%03s", abs($noUrutAkhir + 1)). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
            }
            else {
                $nomorotomatis = sprintf("%03s", $no). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
            }
            return view('warga.surat-pengantar.surat-tambah', compact('nomorotomatis'));
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
        if(Session::get('level') == 'Admin'){
            $surat = Suratpengantar::where('id', $id)->firstOrFail();
            return view('admin.surat-pengantar.edit-surat', compact('surat'));
        }else{
            $surat = Suratpengantar::where('id', $id)->firstOrFail();
            return view('warga.surat-pengantar.edit-surat', compact('surat'));
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
        if(Session::get('level') == 'Admin'){
            $surat = Suratpengantar::where('id', $id)->firstOrFail();
            $surat->nomor_surat = $request->nomor;
            $surat->tanggal = $request->tanggal;
            $surat->status_perkawinan = $request->statusperkawinan;
            $surat->pekerjaan = $request->pekerjaan;
            $surat->pelayanan = $request->pelayanan;
            $surat->status = $request->status;
            $surat->update();
            toastr()->success('Data surat berhasil diedit');
        }else{
            $surat = Suratpengantar::where('id', $id)->firstOrFail();
            $surat->nomor_surat = $request->nomor;
            $surat->tanggal = $request->tanggal;
            $surat->status_perkawinan = $request->statusperkawinan;
            $surat->pekerjaan = $request->pekerjaan;
            $surat->pelayanan = $request->pelayanan;
            $surat->update();
            toastr()->success('Data surat berhasil diedit');
        }
        

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


    public function cetak($id)
    {
        $datasurat = Suratpengantar::findOrfail($id);
        $datauser = Warga::findOrfail($datasurat->user_id);
        $datattd = Ttd::first();
        $pdf = PDF::loadView('warga.surat-pengantar.cetak', array('surat' => $datasurat, 'user' => $datauser, 'ttd' => $datattd));

        //Aktifkan Local File Access supaya bisa pakai file external ( cth File .CSS )
        $pdf->setOption('enable-local-file-access', true);

        // Stream untuk menampilkan tampilan PDF pada browser
        return $pdf->stream('surat-pengantar.pdf');

        // Jika ingin langsung download (tanpai melihat tampilannya terlebih dahulu) kalian bisa pakai fungsi download
        // return $pdf->download('table.pdf);
    }
}
