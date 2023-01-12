@extends('template')

@section('title','Monitoring TK')

@section('mapel','active')

@section('content')
@if(Session::get('LoginRole')=='Super Admin')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Tambah Pelajaran</h1>
    </div>
<form method="POST" action="{{ url('/datmaster-addmapel') }}">
    @method('POST')
    @csrf
    <div class="mb-3">
      <label for="np" class="form-label">Nama Pelajaran</label>
      <input type="text" name="np" class="form-control form-control-sm" id="np">
    </div>
    <div class="mb-3">
      <label for="desc" class="form-label">Deskripsi</label>
      <textarea name="desc" class="form-control" id="desc" style="height: 100px"></textarea>
    </div>
    @foreach ($mapel as $pe)
      <input type="hidden" value="{{$pe->ID_Pelajaran}}" name="Mapel[]">
    @endforeach
    <button type="submit" class="btn btn-sm btn-primary float-end">Submit</button>
    
  </form>
  <a href="{{ url('/datmaster-listguru') }}" class="btn btn-sm btn-danger float-end me-2">Cancel</a>
</main>
@endif
@endsection