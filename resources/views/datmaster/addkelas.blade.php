@extends('template')

@section('title','Monitoring TK')

@section('kelas','active')

@section('content')
@if(Session::get('LoginRole')=='Super Admin')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Tambah Kelas</h1>
    </div>
<form method="POST" action="{{ url('/datmaster-addkelas') }}">
    @method('POST')
    @csrf
    <div class="mb-3">
      <label for="nm" class="form-label">Nama Kelas</label>
      <input type="text" name="nkl" class="form-control form-control-sm" id="nkl">
    </div>
    <div class="mb-3">
        <label for="nip" class="form-label">Nama Walikelas</label>
        <select name="nip" id="nip" class="form-select form-select-sm">
            @foreach ($Guru as $g)
            <option value="{{ $g->NIP_Pengajar }}">{{ $g->Nama_Pengajar }}</option>
            @endforeach
          </select>  
    </div>
    <div class="mb-3">
        <label for="tkl" class="form-label">Tingkat Kelas</label>
        <select name="tkl" id="tkl" class="form-select form-select-sm">
            <option value="Nol Kecil">Nol Kecil</option>
            <option value="Nol Besar">Nol Besar</option>
          </select> 
    </div>
    <div class="mb-3">
        <label for="tm" class="form-label">Tahun Masuk</label>
        <input type="number" name="tm" class="form-control form-control-sm" id="tm">
      </div>
    @foreach ($Kelas as $k)
      <input type="hidden" value="{{$k->ID_Kelas}}" name="Kelas[]">
    @endforeach
    <button type="submit" class="btn btn-sm btn-primary float-end">Submit</button>
    
  </form>
  <a href="{{ url('/datmaster-listkelas') }}" class="btn btn-sm btn-danger float-end me-2">Cancel</a>
</main>
@endif
@endsection