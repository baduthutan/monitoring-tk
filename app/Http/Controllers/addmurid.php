<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Murid;
use App\Models\Userr;
use App\Models\Kelas;

class addmurid extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Murid::get();
        $data2 = Kelas::get();
        return view('datmaster/addmurid')->with([
            'Murid' => $data,
            'Kelas' => $data2
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
        
        $Murid_array = $request->input('Murid');
        $num = 1;
        for ($i = 0; $i < count($Murid_array); $i++) {
            if (strcmp(substr($Murid_array[$i], 0, strlen('M'.$request->tm)), 'M'.$request->tm) == 0) {
                $num++;
            }
        }
        $nis = 'M' . $request->tm . str_pad($num, 3, '0', STR_PAD_LEFT) . rand(1,9);
        $data2 = [
            'username'=> $request->nm . $nis,
            'password'=> $request->nm . $nis,
            'role'=>'Murid'
          ];
          Userr::insert($data2);
        $data1 = [
            'NIS_Murid'=> $nis,
            'username'=> $request->nm . $nis,
            'ID_Kelas'=>$request->kls,
            'Nama_Murid'=>$request->nm,
            'Nama_OrangTua'=>$request->not,
            'Jenis_kelamin'=>$request->jk,
            'Tanggal_Lahir'=>$request->tl
          ];
          Murid::insert($data1);
          
          return redirect('/datmaster-listmurid')->with('status', $nip. ' berhasil ditambahkan');
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
