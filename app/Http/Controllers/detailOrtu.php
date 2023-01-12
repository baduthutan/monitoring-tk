<?php

namespace App\Http\Controllers;
use App\Models\Buku_penghubung;

use Illuminate\Http\Request;

class detailOrtu extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function detailPenghubung(Request $request)
    {
        $data = [
            'idb' => $request->idb,
            'idk' => $request->idk,
            'nis' => $request->nis,
            'idp' => $request->idp,
            'tgl' => $request->tgl,
            'eot' => $request->eot,
            'cg' => $request->cg,
            'mc' => $request->mc,
            'snc' => $request->snc,
            'abs' => $request->abs,
          ];
    
            return view('penghubung/detailPenghubung', $data);
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
        //
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
        $data = [
            'idb' => $request->idb,
            'idk' => $request->idk,
            'nis' => $request->nis,
            'idp' => $request->idp,
            'tgl' => $request->tgl,
            'eot' => $request->eot,
            'cg' => $request->cg,
            'mc' => $request->mc,
            'snc' => $request->snc,
            'abs' => $request->abs,
          ];
    
            return view('penghubung/detailPenghubung', $data);
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
