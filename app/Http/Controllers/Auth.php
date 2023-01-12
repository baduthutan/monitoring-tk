<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Userr as User;
use App\Models\Pengajar as Pengajar;
use App\Models\Murid as Murid;
use App\Models\Kelas as Kelas;
// use App\Models\Buku_penghubung as Bp;

class Auth extends Controller
{
    public function index()
    {
        if(Session::get('LoginRole') !== null)
        {
            return redirect('/dashboard');
        }

        return view('auth.login');
    }
 
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:user,username',
            'password' => 'required'
        ]);

        $user = User::where('username','=',$request->username)->first();
        $pengajar = Pengajar::where('Username','=',$request->username)->first();
        $ortu = Murid::where('Username','=',$request->username)->first();
        

        if($user->password != $request->password)
        {
            return redirect('/login')->with('status','incorrect password');
        } else {
            Session::put('LoginUsername',$user->username);
            Session::put('LoginRole',$user->role);
            if(Session::get('LoginRole')=='Pengajar'){
                $kelas_guru = Kelas::where('NIP_Pengajar','=',$pengajar->NIP_Pengajar)->first();
                Session::put('strong','primary');
                Session::put('LoginName',$pengajar->Nama_Pengajar);
                Session::put('row1','NIP');
                Session::put('row2','Jenis Kelamin');
                Session::put('row3','Nomor Telpon');
                Session::put('row1ans',$pengajar->NIP_Pengajar);
                Session::put('row2ans',$pengajar->Jenis_Kelamin);
                Session::put('row3ans',$pengajar->NO_Telepon);
                Session::put('kelasguru',$kelas_guru->ID_Kelas);
            }
            else if(Session::get('LoginRole')=='Murid'){
                $kelas = Kelas::where('ID_Kelas','=',$ortu->ID_Kelas)->first();
        $walikelas = Pengajar::where('NIP_Pengajar','=',$kelas->NIP_Pengajar)->first();
                Session::put('strong','success');
                Session::put('LoginName',$ortu->Nama_Murid);
                Session::put('row1','NIS');
                Session::put('row2','Jenis Kelamin');
                Session::put('row3','Tanggal Lahir');
                Session::put('row1ans',$ortu->NIS_Murid);
                Session::put('row2ans',$ortu->Jenis_Kelamin);
                Session::put('row3ans',$ortu->Tanggal_Lahir);
                Session::put('nkelas',$kelas->Nama_Kelas);
                Session::put('namawali',$walikelas->Nama_Pengajar);
                Session::put('tkelas',$kelas->Tingkat_Kelas);
                Session::put('jmurid',$kelas->Jumlah_Murid);
            }
            else if(Session::get('LoginRole')=='Super Admin'){

                Session::put('strong','danger');
                Session::put('LoginName',$request->username);
                Session::put('row1','');
                Session::put('row2','');
                Session::put('row3','');
                Session::put('row1ans','');
                Session::put('row2ans','');
                Session::put('row3ans','');
                
            }
            return redirect('/dashboard');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }
}
