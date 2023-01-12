@extends('template')

@section('title','Monitoring TK')

@section('guru','active')

@section('content')
@if(Session::get('LoginRole')=='Super Admin')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List Guru</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <a type="button" class="btn btn-sm btn-outline-primary" href="{{ url('datmaster-addguru') }}">
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
            <th scope="col">NIP Pengajar</th>
            <th scope="col">Nama pengajar</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Nomor Telepon</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($guru as $g)
                <tr>
                    <td>{{ $g->NIP_Pengajar }}</td>
                    <td>{{ $g->Nama_Pengajar }}</td>
                    <td>{{ $g->Jenis_Kelamin }}</td>
                    <td>{{ $g->NO_Telepon }}</td>
                    <td>
                        <form method="POST" action="{{ url('/datmaster-listguru/'.$g->Username) }}">
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