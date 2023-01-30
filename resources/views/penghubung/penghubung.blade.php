@extends('template')

@section('title','Monitoring TK')

@section('bp','active')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Buku Penghubung</h1>
        @if(Session::get('LoginRole')=='Pengajar')
        <div class="btn-toolbar mb-2 mb-md-0">
          <a type="button" class="btn btn-sm btn-outline-primary" href="{{ url('/penghubung/Tambah_Buku') }}">
            <span data-feather="plus" class="align-text-bottom" ></span>
            Tambah
          </a>
        </div>
        @endif
      </div>
      @if(Session::has('status'))
      <div class="alert alert-success" role="alert">
        {{ Session::get('status') }}
      </div>
      @endif
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Tanggal</th>
              <th scope="col">Pelajaran</th>
              
              <th scope="col">Kelas</th>
              
              <th scope="col">Murid</th>
              <th scope="col">Tindakan</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            
                @foreach ($bp as $Buku)
                @if(Session::get('LoginRole')=='Super Admin')
                        
                        <tr>
                            <td>{{ $Buku->tanggal }}</td>
                            <td>{{ $Buku->mapel->Nama_Pelajaran }}</td>
                            <td>{{ $Buku->kelas->Nama_Kelas }}</td>
                            <td>{{ $Buku->murid->Nama_Murid }}</td>
                            <td>
                            
                              <div class="btn-group me-2" role="group">
                                  <form method="POST" action="{{ url('/penghubung-detailbuku/'.$Buku->ID_Buku) }}">
                                    @method('PATCH')
                                    @csrf
                                    <input type="hidden" name="idb" value="{{ $Buku->ID_Buku }}">
                                    <input type="hidden" name="idk" value="{{ $Buku->kelas->Nama_Kelas }}">
                                    <input type="hidden" name="nis" value="{{ $Buku->murid->Nama_Murid }}">
                                    <input type="hidden" name="idp" value="{{ $Buku->mapel->Nama_Pelajaran }}">
                                    <input type="hidden" name="tgl" value="{{ $Buku->tanggal }}">
                                    <input type="hidden" name="eot" value="{{ $Buku->Evaluasi_OrangTua}}">
                                    <input type="hidden" name="cg" value="{{ $Buku->Catatan_Guru }}">
                                    <input type="hidden" name="mc" value="{{ $Buku->Main_Course }}">
                                    <input type="hidden" name="snc" value="{{ $Buku->Snack }}">
                                    <input type="hidden" name="stmc" value="{{ $Buku->Status_Mcourse }}">
                                    <input type="hidden" name="stsnc" value="{{ $Buku->Status_Snack }}">
                                    <input type="hidden" name="abs" value="{{ $Buku->Absen }}">
                                    <button type="button submit" style="border-top-right-radius: 0;
                                    border-bottom-right-radius: 0;" class="btn btn-sm btn-outline-primary">Detail</button>
                                  </form>  
                               
                                  <form method="POST" action="{{ url('/penghubung-detailbuku/'.$Buku->ID_Buku) }}">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="button submit" style="border-top-left-radius: 0;
                                    border-bottom-left-radius: 0;"class="btn btn-sm btn-outline-danger">Hapus</button>
                                    
                                  </form>
                               
                              </div>
                          </td>
                            <td>
                                @if($Buku->Evaluasi_OrangTua !== null)
                                    <span class="badge text-bg-success">Dibalas</span>
                                    @elseif($Buku->Catatan_Guru !== null)
                                    <span class="badge text-bg-warning">Terkirim</span>
                                    @else
                                    <span class="badge text-bg-danger">Belum Diisi</span>
                                @endif
                            </td>
                        </tr>
                     
                    @endif
                    @if(Session::get('LoginRole')=='Murid')
                        @if ($Buku->NIS_Murid==Session::get('row1ans'))
                        <tr>
                          <td>{{ $Buku->tanggal }}</td>
                          <td>{{ $Buku->mapel->Nama_Pelajaran }}</td>
                          <td>{{ $Buku->kelas->Nama_Kelas }}</td>
                          <td>{{ $Buku->murid->Nama_Murid }}</td>
                            <td><form method="POST" action="{{ url('/penghubung-detailortu/'.$Buku->ID_Buku) }}">
                              @method('PATCH')  
                              @csrf
                              <input type="hidden" name="idb" value="{{ $Buku->ID_Buku }}">
                              <input type="hidden" name="idk" value="{{ $Buku->kelas->Nama_Kelas }}">
                              <input type="hidden" name="nis" value="{{ $Buku->murid->Nama_Murid }}">
                              <input type="hidden" name="idp" value="{{ $Buku->mapel->Nama_Pelajaran }}">
                              <input type="hidden" name="tgl" value="{{ $Buku->tanggal }}">
                              <input type="hidden" name="eot" value="{{ $Buku->Evaluasi_OrangTua}}">
                              <input type="hidden" name="cg" value="{{ $Buku->Catatan_Guru }}">
                              <input type="hidden" name="mc" value="{{ $Buku->Main_Course }}">
                              <input type="hidden" name="snc" value="{{ $Buku->Snack }}">
                              <input type="hidden" name="stmc" value="{{ $Buku->Status_Mcourse }}">
                              <input type="hidden" name="stsnc" value="{{ $Buku->Status_Snack }}">
                              <input type="hidden" name="abs" value="{{ $Buku->Absen }}">
                                <button type="submit" class="btn btn-sm btn-outline-primary">Detail</button>
                                
                                
                            </form>
                          </td>
                            <td>
                                @if($Buku->Evaluasi_OrangTua !== null)
                                    <span class="badge text-bg-success">Dibalas</span>
                                    @elseif($Buku->Catatan_Guru !== null)
                                    <span class="badge text-bg-warning">Terkirim</span>
                                    @else
                                    <span class="badge text-bg-danger">Belum Diisi</span>
                                @endif
                            </td>
                        </tr>
                        @endif
                    @endif
                    @if(Session::get('LoginRole')=='Pengajar')
                        @if ($Buku->ID_Kelas==Session::get('kelasguru'))
                        <tr>
                          <td>{{ $Buku->tanggal }}</td>
                          <td>{{ $Buku->mapel->Nama_Pelajaran }}</td>
                          <td>{{ $Buku->kelas->Nama_Kelas }}</td>
                          <td>{{ $Buku->murid->Nama_Murid }}</td>
                              <td><div class="btn-group me-2">
                                  <form method="POST" action="{{ url('/penghubung-detailbuku/'.$Buku->ID_Buku) }}">
                                    @method('PATCH')
                                    @csrf
                                    <input type="hidden" name="idb" value="{{ $Buku->ID_Buku }}">
                                    <input type="hidden" name="idk" value="{{ $Buku->kelas->Nama_Kelas }}">
                                    <input type="hidden" name="nis" value="{{ $Buku->murid->Nama_Murid }}">
                                    <input type="hidden" name="idp" value="{{ $Buku->mapel->Nama_Pelajaran }}">
                                    <input type="hidden" name="tgl" value="{{ $Buku->tanggal }}">
                                    <input type="hidden" name="eot" value="{{ $Buku->Evaluasi_OrangTua}}">
                                    <input type="hidden" name="cg" value="{{ $Buku->Catatan_Guru }}">
                                    <input type="hidden" name="mc" value="{{ $Buku->Main_Course }}">
                                    <input type="hidden" name="snc" value="{{ $Buku->Snack }}">
                                    <input type="hidden" name="stmc" value="{{ $Buku->Status_Mcourse }}">
                                    <input type="hidden" name="stsnc" value="{{ $Buku->Status_Snack }}">
                                    <input type="hidden" name="abs" value="{{ $Buku->Absen }}">
                                    <button type="button submit" style="border-top-right-radius: 0;
                                    border-bottom-right-radius: 0;" class="btn btn-sm btn-outline-primary">Detail</button>
                                  </form>  
                        
                           
                                  <form method="POST" action="{{ url('/penghubung-detailbuku/'.$Buku->ID_Buku) }}">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="button submit" style="border-top-left-radius: 0;
                                    border-bottom-left-radius: 0;"class="btn btn-sm btn-outline-danger">Hapus</button>
                                    
                                  </form>
                                </div>
                       
                          </td>
                            <td>
                                @if($Buku->Evaluasi_OrangTua !== null)
                                    <span class="badge text-bg-success">Dibalas</span>
                                    @elseif($Buku->Catatan_Guru !== null)
                                    <span class="badge text-bg-warning">Terkirim</span>
                                    @else
                                    <span class="badge text-bg-danger">Belum Diisi</span>
                                @endif
                            </td>
                        </tr>
                        @endif
                    @endif
                @endforeach             
            
            
          </tbody>
        </table>
      </div>
</main>
@endsection