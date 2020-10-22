<?php

namespace App\Http\Controllers;

use App\User;
use App\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu harus login dulu');
        }
        else{
            return view('beranda');
        }
    }

    public function indexwarga(){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu harus login dulu');
        }
        else{
            return view('beranda-warga');
        }
    }

    public function login(){
        if(Session::get('login')){
            return view('beranda');        
        }
        return view('login');
    }

    public function loginPost(Request $request){

        $username = $request->username;
        $password = $request->password;

        $cariuser = User::where('username',$username)->first();
       
            if($cariuser){ //apakah user tersebut ada atau tidak
                $cariwarga = Warga::where('user_id',$cariuser->id)->first();
                if($cariwarga->status === "Waiting"){ //jika status user tidak = waiting
                    toastr()->warning('Menunggu Konfirmasi, Coba Beberapa Saat Lagi!');
                    return redirect('login');
                }else{
                    if(Hash::check($password,$cariuser->password)){//apakah pencocokan password sama atau tidak
                        Session::put('id',$cariuser->id);
                        Session::put('username',$cariuser->username);
                        Session::put('email',$cariuser->email);
                        Session::put('nama',$cariwarga->nama);
                        Session::put('tempat_lahir',$cariwarga->tempat_lahir);
                        Session::put('tanggal_lahir',$cariwarga->tanggal_lahir);
                        Session::put('agama',$cariwarga->agama);
                        Session::put('jenis_kelamin',$cariwarga->jenis_kelamin);
                        Session::put('no_hp',$cariwarga->no_hp);
                        Session::put('alamat',$cariwarga->alamat);
                        Session::put('level',$cariuser->level);
                        Session::put('login',TRUE);

                        if ($cariuser->level === "Warga") {
                            return redirect('berandawarga');
                        } else {
                            return redirect('beranda');
                        }
                        
                    }else{
                        toastr()->warning('Password atau Username, Salah !');
                        return redirect('login');
                    }
                }
            }else{
                toastr()->warning('Data User Tidak Terdaftar');
                return redirect('login');
            }
     
    }

    public function logout(){
        Session::flush();
        toastr()->success('Kamu Berhasil Logout');
        return redirect('login');
    }

    public function register(Request $request){
        return view('register');
    }

    public function registerPost(Request $request){
        $this->validate($request, [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'email' => ['required'],
            'no_hp' => ['required'],
            'no_kk' => ['required', 'numeric'],
            'nik' => ['required', 'numeric'],
            'nama' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date'],
            'agama' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255']
        ]);

       $user =  User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'level' => "Warga"
        ]);

        Warga::create([
            'no_kk' => $request['no_kk'],
            'nik' => $request['nik'],
            'nama' => $request['nama'],
            'tempat_lahir' => $request['tempat_lahir'],
            'tanggal_lahir' => $request['tanggal_lahir'],
            'agama' => $request['agama'],
            'jenis_kelamin' => $request['jenis_kelamin'],
            'no_hp' => $request['no_hp'],
            'alamat' => $request['alamat'],
            'kelurahan' => "Bandar Lor",
            'kecamatan' => "Mojoroto",
            'kota' => "Kediri",
            'status' => "Waiting",
            'user_id' => $user->id
        ]);

        toastr()->success('Registrasi berhasil, Silahkan menunggu konfirmasi data, Baru anda bisa login');

        return redirect('login');
    }

    public function show() {
    $warga = Warga::paginate(3);
    return view('adminwarga.warga.warga', compact('warga'));
    }

    public function detailProfil($id) {
        $warga = Warga::where('user_id', $id)->firstOrFail();
        return view('adminwarga.warga.detailprofil', compact('warga'));
    }

    public function detail($id) {
        
        $warga = Warga::where('user_id', $id)->firstOrFail();
        return view('adminwarga.warga.detail', compact('warga'));
    }

    public function editProfil($id) {
    $warga = Warga::where('user_id', $id)->firstOrFail();
    return view('adminwarga.warga.edit', compact('warga'));

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

        return view('adminwarga.warga.detail', compact('warga'));
        
    }

    public function validasi($id) {
  
        $warga = Warga::where('user_id', $id)->firstOrFail();
        $warga->status = 'Confirmed';
        $warga->update();
        toastr()->success('Data Sukses Divalidasi.');
        return redirect('warga');
    }

    public function deleteWarga($id) {
        $warga = User::findOrfail($id);
        $warga->delete();
        toastr()->success('Data Sukses Dihapus.');
        return redirect('warga');
    }
}
