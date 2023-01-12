@extends('template')

@section('title','Monitoring TK')

@section('mapel','active')

@section('content')
@if(Session::get('LoginRole')=='Super Admin')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List Pelajaran</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <a type="button" class="btn btn-sm btn-outline-primary" href="{{ url('datmaster-addmapel') }}">
            <span data-feather="plus" class="align-text-bottom" ></span>
            Tambah
          </a>
        </div>
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
            <th scope="col">ID Pelajaran</th>
            <th scope="col">Nama Pelajaran</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mapel as $pe)
                <tr>
                    <td>{{ $pe->ID_Pelajaran }}</td>
                    <td>{{ $pe->Nama_Pelajaran }}</td>
                    <td>{{ $pe->Deskripsi }}</td>
                    <td>
                        <form method="POST" action="{{ url('/datmaster-listmapel/'.$pe->ID_pelajaran) }}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="button submit" class="btn btn-sm btn-outline-danger">Delete</button>   
                          </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</main>
@endif
@endsection