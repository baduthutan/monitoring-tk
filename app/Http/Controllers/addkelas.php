<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Pengajar;

class addkelas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pengajar::get();
        $data2 = Kelas::get();
        return view('datmaster/addkelas')->with([
            'Guru' => $data,
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
        $Kelas_array = $request->input('Kelas');
        $num = 1;
        for ($i = 0; $i < count($Kelas_array); $i++) {
                $num++;
        }
        $id = 'K' . $request->tm . str_pad($num, 3, '0', STR_PAD_LEFT) . rand(1,9);
        $data1 = [
            'ID_Kelas'=> $id,
            'NIP_Pengajar' => $request->nip,
            'Tingkat_Kelas' => $request->tkl,
            'Nama_Kelas'=> $request->nkl,
            'Tahun_Masuk' => $request->tm
            
          ];
          Kelas::insert($data1);
          
          return redirect('/datmaster-listkelas')->with('status', $id. ' berhasil ditambahkan');;
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
