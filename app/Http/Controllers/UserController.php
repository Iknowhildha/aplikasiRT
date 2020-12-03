<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use App\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function beranda(){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu harus login dulu');
        }
        elseif(Session::get('level') == 'Admin'){
            return view('admin.beranda');
        }else{
            return redirect('warga.beranda');
        }
    }


    public function login(){
        if(Session::get('login') && Session::get('level') == 'Admin'){
            return redirect('admin/beranda');        
        }elseif(Session::get('login') && Session::get('level') == 'Warga'){
            return redirect('beranda');
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
                            return redirect('beranda');
                        } else {
                            return redirect('admin/beranda');
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

    public function warga() {
        $warga = DB::table('warga')
        ->leftJoin('users', 'warga.user_id', '=', 'users.id')
        ->where('users.level','Warga')
        ->orderBy('users.id', 'DESC')
        ->paginate(10);
    return view('admin.warga.warga', compact('warga'));
    }

    public function detailProfil($id) {
        $warga = Warga::where('user_id', $id)->firstOrFail();
        return view('admin.warga.detailprofil', compact('warga'));
    }

    public function detail($id) {
        
        $warga = Warga::where('user_id', $id)->firstOrFail();
        return view('admin.warga.detail', compact('warga'));
    }

    public function editProfil($id) {
    $warga = Warga::where('user_id', $id)->firstOrFail();
    return view('admin.warga.edit', compact('warga'));

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

        return redirect::to('detailprofil/'.$id);
        
    }

    public function validasi($id) {
  
        $warga = Warga::where('user_id', $id)->firstOrFail();
        $warga->status = 'Confirmed';
        $warga->update();
        toastr()->success('Data Sukses Divalidasi.');
        return redirect::to('admin/warga');
    }

    public function deleteWarga($id) {
        $warga = User::findOrfail($id);
        $warga->delete();
        toastr()->success('Data Sukses Dihapus.');
        return redirect::to('admin/warga');
    }

    public function user(){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu harus login dulu');
        }
        $user = User::where('level','Admin')->paginate(10);
        return view('admin.user.user',  compact('user'));
    }

    public function tambahuser(){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu harus login dulu');
        }
        return view('admin.user.tambah-user');
    }

    public function simpanuser(Request $request)
    {
        $user =  User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'level' => "Admin",
        ]);

        Warga::create([
            'no_kk' => null,
            'nik' => null,
            'nama' => $request['nama'],
            'tempat_lahir' => null,
            'tanggal_lahir' => null,
            'agama' => "-",
            'alamat' => "-",
            'kelurahan' => "-",
            "kecamatan" => "-",
            "kota" => "-",
            'jenis_kelamin' => $request['jenis_kelamin'],
            'no_hp' => $request['no_hp'],
            'status' => 'Confirmed',
            'user_id' => $user->id
        ]);
        toastr()->success('Data berhasil disimpan.');
        return redirect::to('admin/user');
    }

    public function edituser($id){
        $warga = Warga::where('user_id', $id)->firstOrFail();
        $user = User::where('id', $id)->firstOrFail();
        return view('admin.user.edit-user', compact('warga','user'));
    }

    public function updateuser(Request $request, $id)
    {
        $warga = Warga::where('user_id', $id)->firstOrFail();
        $warga->nama = $request->nama;
        $warga->jenis_kelamin = $request->jenis_kelamin;
        $warga->no_hp = $request->no_hp;
        $warga->update();

        if ($request->password != null) {
            $user = User::where('id',$id)->firstOrFail();
            $user->username = $request->username;
            $user->password =  Hash::make($request->password);
            $user->email = $request->email;
            $user->update();
        }else{
            $user = User::where('id',$id)->firstOrFail();
            $user->username = $request->username;
            $user->email = $request->email;
            $user->update();
        }

    

       
        toastr()->success('Data berhasil diupdate.');
        return redirect::to('admin/user');
    }

    
    public function deleteuser($id) {
        $warga = User::findOrfail($id);
        $warga->delete();
        toastr()->success('Data Sukses Dihapus.');
        return redirect::to('admin/user');
    }
}
