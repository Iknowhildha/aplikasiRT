<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AgendaController extends Controller
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
            $agenda = Agenda::paginate(10);
            return view('admin.agenda.agenda', compact('agenda'));
        }else{

            $agenda = Agenda::paginate(10);
            return view('warga.agenda.agenda', compact('agenda'));
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
            return view('admin.agenda.tambah-agenda');
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
            'isi' => ['required', 'string'],
            'tanggal' => ['required', 'date'],
            'tempat' => ['required', 'string'],
            'keterangan' => ['required', 'string']
        ],
        [
            'nama.required' => 'kolom nama tidak boleh kosong',
            'isi.required' => 'kolom isi tidak boleh kosong',
            'tanggal.required' => 'kolom tanggal tidak boleh kosong',
            'tempat.required' => 'kolom tempat tidak boleh kosong',
            'keterangan.required' => 'kolom keterangan tidak boleh kosong',
        ]
    );

        Agenda::create([
            'nama_agenda' => $request['nama'],
            'isi_agenda' => $request['isi'],
            'tanggal_agenda' => $request['tanggal'],
            'tempat_agenda' => $request['tempat'],
            'keterangan_agenda' => $request['keterangan'],
            'user_id' => Session::get('id')
        ]);

        toastr()->success('Data agenda berhasil ditambahkan');

        return redirect('agenda');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Session::get('level') == 'Admin'){
            $agenda = Agenda::where('id', $id)->firstOrFail();
            return view('admin.agenda.detail-agenda', compact('agenda'));
        }else{
            $agenda = Agenda::where('id', $id)->firstOrFail();
            return view('warga.agenda.detail-agenda', compact('agenda'));
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
        $agenda = Agenda::where('id', $id)->firstOrFail();
        return view('admin.agenda.edit-agenda', compact('agenda'));
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
        $agenda = Agenda::where('id', $id)->firstOrFail();
        $agenda->nama_agenda = $request->nama;
        $agenda->isi_agenda = $request->isi;
        $agenda->tanggal_agenda = $request->tanggal;
        $agenda->tempat_agenda = $request->tempat;
        $agenda->keterangan_agenda = $request->keterangan;
        $agenda->user_id = Session::get('id');

        $agenda->update();
        toastr()->success('Data agenda berhasil diedit');

        return redirect::to('admin/agenda');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agenda = Agenda::findOrfail($id);
        $agenda->delete();
        toastr()->success('Data Sukses Dihapus.');
        return redirect::to('admin/agenda');
    }
}
