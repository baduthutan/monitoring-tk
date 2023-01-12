<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userr;

class gantipass extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gantipass');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user = Userr::where('username','=',$request->username)->first();
        $data = ['uname'=>$request->uname];
        return view('gantipass', $data);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $gantipass)
    {
        $user = Userr::where('username','=',$gantipass)->first();
        if($user->password != $request->oldpass)
        {
            return redirect('/gantipass')->with('status','Password lama salah!');
        }elseif($request->newpass != $request->reenter){
            return redirect('/gantipass')->with('status','Ulang password baru salah!');
        }else{
            $data = Userr::where('username','=',$gantipass)->update([
                'password' => $request->newpass
            ]);
           
            return redirect('/dashboard')->with('status','Ganti Password berhasil!');
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
        //
    }
}
