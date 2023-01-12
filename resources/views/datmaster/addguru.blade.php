@extends('template')

@section('title','Monitoring TK')

@section('guru','active')

@section('content')
@if(Session::get('LoginRole')=='Super Admin')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Tambah Guru</h1>
    </div>
<form method="POST" action="{{ url('/datmaster-addguru') }}">
    @method('POST')
    @csrf
    <div class="mb-3">
      <label for="nm" class="form-label">Nama Guru</label>
      <input type="text" name="nm" class="form-control form-control-sm" id="nm">
    </div>
    <div class="mb-3">
        <label for="jk" class="form-label">Jenis Kelamin</label>
        <select name="jk" id="jk" class="form-select form-select-sm">
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>  
    </div>
    <div class="mb-3">
      <label for="nt" class="form-label">Nomor Telepon</label>
      <input type="text" name="nt" class="form-control form-control-sm" id="nt">
    </div>
    @foreach ($Guru as $g)
      <input type="hidden" value="{{$g->NIP_Pengajar}}" name="Guru[]">
    @endforeach
    <button type="submit" class="btn btn-sm btn-primary float-end">Submit</button>
    
  </form>
  <a href="{{ url('/datmaster-listguru') }}" class="btn btn-sm btn-danger float-end me-2">Cancel</a>
</main>
@endif
@endsection