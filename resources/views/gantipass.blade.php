@extends('template')

@section('title','Monitoring TK')

@section('db','active')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Ganti Password</h1>
        </div>
        @if(Session::has('status'))
        <div class="alert alert-danger" role="alert">
          {{ Session::get('status') }}
        </div>
        @endif
            <form method="POST" action="{{ url('/gantipass/'.Session::get('LoginUsername')) }}">
              @method('PATCH')
              @csrf
            <div class="mb-3">
                <label for="oldpass" class="form-label">Password Lama</label>
                <input type="password" class="form-control form-control-sm" id="oldpass" name="oldpass">
              </div>
              <div class="mb-3">
                <label for="newpass" class="form-label">Pasword Baru</label>
                <input type="password" class="form-control form-control-sm" id="newpass" name="newpass">
              </div>
              <div class="mb-3">
                <label for="reenter" class="form-label">Ulang Password Baru</label>
                <input type="password" class="form-control form-control-sm" id="reenter" name="reenter">
              </div>
              <button type="submit" class="btn btn-sm btn-primary float-end">Submit</button>
        </form>
        <a href="{{ url('/dashboard') }}" class="btn btn-sm btn-danger float-end me-2">Batal</a>
    </main>
@endsection