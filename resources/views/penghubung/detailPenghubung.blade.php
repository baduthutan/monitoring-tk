@extends('template')

@section('title','Monitoring TK')

@section('bp','active')

@section('absen')
@if($abs == 'Hadir')
<span class="badge text-bg-success">Hadir</span>
@endif
@if($abs == 'Sakit')
<span class="badge text-bg-warning">Sakit</span>
@endif
@if($abs == 'Izin')
<span class="badge text-bg-secondary">Izin</span>
@endif
@if($abs == 'Alpa')
<span class="badge text-bg-danger">Alpa</span>
@endif
@endsection

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Buku Penghubung</h1>
      </div>
      <div class="table-responsive pb-4">
      <table class="table text-start" >
        <thead>
          <tr>
            <th style="width: 30%;">ID Buku</th>
            <td style="width: 70%;">{{ $idb }}</td>
  
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Tanggal</th>
            <td>
                {{ $tgl }}
            </td>
          </tr>
          <tr>
            <th scope="row">Pelajaran</th>
            <td>
              {{ $idp }}
            </td>
          </tr>
          <tr>
            <th scope="row">Kelas</th>
            <td>
              {{ $idk }}
            </td>
          </tr>
          <tr>
            <th scope="row">Murid</th>
            <td>
              {{ $nis }}
            </td>
          </tr>
          <tr>
            <th scope="row">Main Course</th>
            <td>
              {{ $mc }}
            </td>
          </tr>
          <tr>
            <th scope="row">Snack</th>
            <td>
              {{ $snc }}
            </td>
          </tr>
          <tr>
            <th scope="row">Status Absen</th>
            <td>
              @yield('absen')
            </td>
          </tr>
        </tbody>
      </table>

      @if(Session::get('LoginRole')=='Super Admin')
      <form>
        <h5>Pesan Guru</h5>
        <div class="form-floating mb-3">
          <textarea class="form-control" placeholder="Leave a comment here" id="cg" name="cg" style="height: 100px" disabled>{{ $cg }}</textarea>
          <label for="pesanguru">Masukkan Pesan</label>
        </div>
        <h5>Catatan Orang Tua</h5>
        <div class="form-floating mb-3">    
          <textarea class="form-control" placeholder="Leave a comment here" id="eot" name="eot" style="height: 100px" disabled>{{ $eot }}</textarea>
          <label for="floatingTextarea2">Masukkan Catatan</label>  
        </div>
      </form> 
      <a href="{{ url('/penghubung') }}" class="btn btn-sm btn-secondary float-end me-2">Kembali</a>     
      @endif

      @if(Session::get('LoginRole')=='Pengajar')
      <form method="POST" action="{{ url('/penghubung/'.$idb) }}">
        @method('PATCH')
        @csrf
        
        <h5>Pesan Guru</h5>
        <div class="form-floating mb-3">
          <textarea class="form-control" placeholder="Leave a comment here" id="cg" name="cg" style="height: 100px">{{ $cg }}</textarea>
          <label for="pesanguru">Masukkan Pesan</label>
        </div>
        <h5>Catatan Orang Tua</h5>
        <div class="form-floating mb-3">    
          <textarea class="form-control" placeholder="Leave a comment here" id="eot" name="eot" style="height: 100px" disabled>{{ $eot }}</textarea>
          <label for="floatingTextarea2">Masukkan Catatan</label>  
        </div>
      
        <button type="submit" class="btn btn-sm btn-primary float-end">Submit</button>
      </form> 
      <a href="{{ url('/penghubung') }}" class="btn btn-sm btn-danger float-end me-2">Batal</a>     
      @endif

      @if(Session::get('LoginRole')=='Murid')
      <form method="POST" action="{{ url('/penghubung-ortu/'.$idb) }}">
        @method('PATCH')
        @csrf
        
        <h5>Pesan Guru</h5>
        <div class="form-floating mb-3">
          <textarea class="form-control" placeholder="Leave a comment here" id="cg" name="cg" style="height: 100px" disabled>{{ $cg }}</textarea>
          <label for="pesanguru">Masukkan Pesan</label>
        </div>
        <h5>Catatan Orang Tua</h5>
        <div class="form-floating mb-3">    
          <textarea class="form-control" placeholder="Leave a comment here" id="eot" name="eot" style="height: 100px">{{ $eot }}</textarea>
          <label for="floatingTextarea2">Masukkan Catatan</label>  
        </div>
      
        <button type="submit" class="btn btn-sm btn-primary float-end">Submit</button>
      </form> 
      <a href="{{ url('/penghubung') }}" class="btn btn-sm btn-danger float-end me-2">Batal</a>     
      @endif

      </div>
</main>
@endsection