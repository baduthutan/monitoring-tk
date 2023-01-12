@extends('template')

@section('title','Monitoring TK')

@section('murid','active')

@section('content')
@if(Session::get('LoginRole')=='Super Admin')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List Murid</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <a type="button" class="btn btn-sm btn-outline-primary" href="{{ url('datmaster-addmurid') }}">
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
            <th scope="col">NIS Murid</th>
            <th scope="col">Kelas</th>
            <th scope="col">Nama Murid</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Nama Orang Tua</th>
            <th scope="col">Tanggal Lahir</th>
            <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($murid as $mrd)
                <tr>
                    <td>{{ $mrd->NIS_Murid }}</td>
                    <td>{{ $mrd->kelas->Nama_Kelas }}</td>
                    <td>{{ $mrd->Nama_Murid }}</td>
                    <td>{{ $mrd->Jenis_Kelamin }}</td>
                    <td>{{ $mrd->Nama_OrangTua }}</td>
                    <td>{{ $mrd->Tanggal_Lahir }}</td>
                    <td>
                        <form method="POST" action="{{ url('/datmaster-listmurid/'.$mrd->username) }}">
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