<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventaris;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

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
        elseif(Session::get('level') != "Warga"){
            $inventaris = Inventaris::paginate(10);
            return view('admin.inventaris.inventaris', compact('inventaris'));
        }else{
            $inventaris = Inventaris::paginate(10);
            return view('warga.inventaris.inventaris', compact('inventaris'));
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
            return view('admin.inventaris.tambah-inventaris');
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

        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];

        $this->validate($request, [
            'nama' => ['required', 'string', 'max:255'],
            'jumlah' => ['required', 'numeric'],
            'satuan' => ['required', 'string'],
            'tanggal_beli' => ['required', 'date'],
            'keterangan' => ['required', 'string']
        ],
        [
            'nama.required' => 'kolom nama tidak boleh kosong',
            'nama.numeric' => 'inputan harus berupa angka',
            'jumlah.required' => 'kolom jumlah tidak boleh kosong',
            'satuan.required' => 'kolom satuan tidak boleh kosong',
            'tanggal_beli.required' => 'kolom tanggal beli tidak boleh kosong',
            'keterangan.required' => 'kolom keterangan tidak boleh kosong',
        ]
    );

        Inventaris::create([
            'nama_inventaris' => $request['nama'],
            'jumlah' => $request['jumlah'],
            'satuan' => $request['satuan'],
            'tanggal_beli' => $request['tanggal_beli'],
            'keterangan_inventaris' => $request['keterangan'],
            'user_id' => Session::get('id')
        ]);

        toastr()->success('Data inventaris berhasil ditambahkan');

        return redirect::to('admin/inventaris');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Session::get('level') != "Warga"){
            $inventaris = Inventaris::where('id', $id)->firstOrFail();
        return view('admin.inventaris.detail-inventaris', compact('inventaris'));
        }else{
            $inventaris = Inventaris::where('id', $id)->firstOrFail();
            return view('warga.inventaris.detail-inventaris', compact('inventaris'));
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
        $inventaris = Inventaris::where('id', $id)->firstOrFail();
        return view('admin.inventaris.edit-inventaris', compact('inventaris'));
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

        return redirect::to('admin/inventaris');
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
        return redirect::to('admin/inventaris');
    }
}
