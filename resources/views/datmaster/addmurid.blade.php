@extends('template')

@section('title','Monitoring TK')

@section('murid','active')

@section('content')
@if(Session::get('LoginRole')=='Super Admin')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Tambah Murid</h1>
    </div>
<form method="POST" action="{{ url('/datmaster-addmurid') }}">
    @method('POST')
    @csrf
    <div class="mb-3">
      <label for="nm" class="form-label">Nama Murid</label>
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
      <label for="kls" class="form-label">Kelas</label>
      <select name="kls" id="kls" class="form-select form-select-sm">
        @foreach ($Kelas as $Kls)
        <option value="{{$Kls->ID_Kelas}}">{{ $Kls->Nama_Kelas }}  ({{ $Kls->Tahun_Masuk }})</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
        <label for="tm" class="form-label">Tahun Masuk</label>
        <input type="number" class="form-control form-control-sm" id="tm" name="tm">
      </div>
    <div class="mb-3">
      <label for="not" class="form-label">Nama Orang Tua</label>
      <input type="text" class="form-control form-control-sm" id="not" name="not">
    </div>
    <div class="mb-3">
      <label for="tl" class="form-label">Tanggal Lahir</label>
      <input type="date" class="form-control form-control-sm" id="tl" name="tl">
    </div>
    @foreach ($Murid as $Mrd)
      <input type="hidden" value="{{$Mrd->NIS_Murid}}" name="Murid[]">
    @endforeach
    <button type="submit" class="btn btn-sm btn-primary float-end">Submit</button>

    
  </form>
  <a href="{{ url('/datmaster-listmurid') }}" class="btn btn-sm btn-danger float-end me-2">Cancel</a>
</main>
@endif
@endsection