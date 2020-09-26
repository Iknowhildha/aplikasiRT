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
                    return redirect('login')->with('alert','Menunggu Konfirmasi Coba Beberapa Saat Lagi!');
                }else{
                    if(Hash::check($password,$cariuser->password)){//apakah pencocokan password sama atau tidak
                        Session::put('username',$cariuser->username);
                        Session::put('email',$cariuser->email);
                        Session::put('nama',$cariwarga->nama);
                        Session::put('tempat_lahir',$cariwarga->tempat_lahir);
                        Session::put('tanggal_lahir',$cariwarga->tanggal_lahir);
                        Session::put('agama',$cariwarga->agama);
                        Session::put('jenis_kelamin',$cariwarga->jenis_kelamin);
                        Session::put('no_hp',$cariwarga->no_hp);
                        Session::put('alamat',$cariwarga->alamat);
                        Session::put('login',TRUE);
                        
                        return redirect('beranda');
                    }else{
                        return redirect('login')->with('alert','Password atau Username, Salah !');
                    }
                }
            }else{
                return redirect('login')->with('alert','Data User Tidak Terdaftar');
            }
     
    }

    public function logout(){
        Session::flush();
        return redirect('login')->with('alert','Kamu sudah logout');
    }

    public function register(Request $request){
        return view('register');
    }

    public function registerPost(Request $request){
        // $this->validate($request, [
        //     'username' => ['required', 'string', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        //     'no_kk' => ['required', 'numeric'],
        //     'nik' => ['required', 'numeric'],
        //     'nama' => ['required', 'string', 'max:255'],
        //     'tempat_lahir' => ['required', 'string', 'max:255'],
        //     'tanggal_lahir' => ['required', 'date'],
        //     'agama' => ['required', 'string', 'max:255'],
        //     'jenis_kelamin' => ['required', 'string', 'max:255'],
        //     'alamat' => ['required', 'string', 'max:255']
        // ]);

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

        return redirect('login');
    }
}
