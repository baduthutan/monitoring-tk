@extends('template')

@section('title','Monitoring TK')

@section('bp','active')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Tambah Buku Penghubung</h1>
    </div>
<form method="POST" action="{{ url('/penghubung') }}">
    @method('POST')
    @csrf
    <div class="mb-3">
      <label for="tgl" class="form-label">Tanggal</label>
      <input type="date" name="tgl" class="form-control form-control-sm" id="tgl">
    </div>
    <div class="mb-3">
      <label for="mapel" class="form-label">Pelajaran</label>
      <select name="mapel" id="mapel" class="form-select form-select-sm">
        @foreach ($Mapel as $Mpl)
        <option value="{{$Mpl->ID_Pelajaran}}">{{ $Mpl->Nama_Pelajaran }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="mcourse" class="form-label">Main course</label>
      <input type="text" class="form-control form-control-sm" id="mcourse" name="mcourse">
    </div>
    <div class="mb-3">
      <label for="snack" class="form-label">Snack</label>
      <input type="text" class="form-control form-control-sm" id="snack" name="snack">
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col" style="width: 70%;">Nama</th>
              <th scope="col" style="width: 30%;">Absensi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($Murid as $Mrd)
              @if ($Mrd->ID_Kelas==Session::get('kelasguru'))
                <tr>
                    <input type="hidden" name="idk[]" value="{{ $Mrd->ID_Kelas }}">
                    <input type="hidden" name="nis[]" value="{{ $Mrd->NIS_Murid }}">
                    <td>{{ $Mrd->Nama_Murid }}</td>
                    <td>
                        <select name="status[]" id="status" class="form-select form-select-sm" style="width: 85px;">
                            <option value="Hadir">Hadir</option>
                            <option value="Izin">Izin</option>
                            <option value="Sakit">Sakit</option>
                            <option value="Alpa">Alpa</option>
                          </select>  
                    </td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
      <button type="submit" class="btn btn-sm btn-primary float-end">Submit</button>
  </form>
  <a href="{{ url('/penghubung') }}" class="btn btn-sm btn-danger float-end me-2">Cancel</a>
</main>
@endsection