@extends('template')

@section('title','Monitoring TK')

@section('kelas','active')

@section('content')
@if(Session::get('LoginRole')=='Super Admin')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List Kelas</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <a type="button" class="btn btn-sm btn-outline-primary" href="{{ url('datmaster-addkelas') }}">
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
            <th scope="col">ID Kelas</th>
            <th scope="col">Nama Walikelas</th>
            <th scope="col">Nama Kelas</th>
            <th scope="col">Tingkat Kelas</th>
            <th scope="col">Tahun Masuk</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelas as $k)
                <tr>
                    <td>{{ $k->ID_Kelas }}</td>
                    <td>{{ $k->guru->Nama_Pengajar }}</td>
                    <td>{{ $k->Nama_Kelas }}</td>
                    <td>{{ $k->Tingkat_Kelas }}</td>
                    <td>{{ $k->Tahun_Masuk }}</td>
                    <td>
                        <form method="POST" action="{{ url('/datmaster-listkelas/'.$k->ID_Kelas) }}">
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