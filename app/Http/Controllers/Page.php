<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Murid;
use App\Models\Pengajar;
use App\Models\Mapel;
use App\Models\Buku_penghubung;


class Page extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $data = Murid::get();

        return view('landing')->with(['murid' => $data]);
    }
    
    public function pelajaran()
    {
        return $this->belongsTo('App\Models\Mapel');
    }
    public function index()
    {
        $data1 = Buku_penghubung::with('mapel', 'kelas', 'murid')->get();
        $data2 = Pengajar::get();

        return view('penghubung/penghubung')->with(['bp' => $data1],['pengajar' => $data2]);
    }

    public function indexAdd()
    {
        $data1 = Buku_penghubung::get();
        $data2 = Mapel::get();
        $data3 = Murid::get();
        return view('penghubung/tambahPenghubung')->with([
            'bp' => $data1,
            'Mapel' => $data2,
            'Murid' => $data3
          ]);
    }


    public function update(Request $request, $id)
    {
        $data = Buku_penghubung::where('ID_Buku','=',$id)->update([
            'Catatan_Guru' => $request->cg
        ]);
       
        return redirect('/penghubung');
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
  $tgl = $request->input('tgl');
  $idp = $request->input('mapel');
  $mc = $request->input('mcourse');
  $snc = $request->input('snack');
  $status_array = $request->input('status');
  $nis_array = $request->input('nis');
  $idk_array = $request->input('idk');
  $maincourse_array = $request->input('maincourse');
  $snack_array = $request->input('snack');
  $newdate = str_replace('-', '', $tgl);
  for ($i = 0; $i < count($idk_array); $i++) {
    $data = [
      'ID_Buku' => 'BP' . $newdate . str_replace('M', '', $nis_array[$i]) . str_replace('PE', '', $idp),
      'ID_Kelas' => $idk_array[$i],
      'NIS_Murid' => $nis_array[$i],
      'ID_Pelajaran' => $idp,
      'tanggal' => $tgl,
      'Main_Course' => $mc,
      'Snack' => $snc,
      'Status_Mcourse' => $maincourse_array[$i],
      'Status_Snack' => $snack_array[$i],
      'Absen' => $status_array[$i],
    ];
    Buku_penghubung::insert($data);
  }
  return redirect('/penghubung');
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
