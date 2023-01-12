<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajar;
use App\Models\Userr;

class addguru extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pengajar::get();
        return view('datmaster/addguru')->with([
            'Guru' => $data
          ]);
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
        $Guru_array = $request->input('Guru');
        $num = 1;
        for ($i = 0; $i < count($Guru_array); $i++) {
                $num++;      
        }
        $nip = 'P' . str_pad($num, 3, '0', STR_PAD_LEFT) . rand(1,9);
        $data2 = [
            'username'=> $request->nm . $nip,
            'password'=> $request->nm . $nip,
            'role'=>'Pengajar'
          ];
          Userr::insert($data2);
        $data1 = [
            'NIP_Pengajar' => $nip,
            'username'=> $request->nm . $nip,
            'Nama_Pengajar'=>$request->nm,     
            'Jenis_kelamin'=>$request->jk,
            'NO_Telepon'=>$request->nt
          ];
          Pengajar::insert($data1);
          
          return redirect('/datmaster-listguru')->with('status', $nip. ' berhasil ditambahkan');
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
    public function update(Request $request, $id)
    {
        //
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
