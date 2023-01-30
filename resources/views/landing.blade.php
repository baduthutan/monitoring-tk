@extends('template')

@section('title','Monitoring TK')

@section('db','active')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                @if(null !== Session::get('LoginRole')) 
                    <div class="d-flex pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Dashboard</h1>
                    </div>
                    @if(Session::has('status'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('status') }}
                    </div>
                    @endif
                    <div class="col-md">
                        <div class="row g-0 border rounded overflow-hidden flex-md-row mt-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-{{ Session::get('strong') }}">{{Session::get('LoginRole')}}</strong>
                            <h3 class="mb-0">{{Session::get('LoginName')}}</h3>
                            <div class="table-responsive">
                            <table class="table text-start" >
                                <thead>
                                <tr>
                                    <th style="width: 30%;"></th>
                                    <th style="width: 70%;"></th>
                        
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">{{Session::get('row1')}}</th>
                                    <td>
                                        {{Session::get('row1ans')}}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{Session::get('row2')}}</th>
                                    <td>
                                    {{Session::get('row2ans')}}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{Session::get('row3')}}</th>
                                    <td>
                                        {{Session::get('row3ans')}}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                            
                         <a href="{{ url('/gantipass') }}" class="stretched-link">Ganti password</a>
                          
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img alt="dashboard background" width="200" height="300" src="https://w0.peakpx.com/wallpaper/878/206/HD-wallpaper-epico-fondo-abstract-art-black-and-white-design-digital-good-powerful-weerbeatsart-wild.jpg">
                
                        </div>
                        </div>
                    </div>
                    @if(Session::get('LoginRole')=='Murid')
                        <div class="pt-3 pb-2 mb-3 border-bottom">
                            <h2>Detail Kelas</h2>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                <th scope="col">Nama Kelas</th>
                                <th scope="col">Tingkat Kelas</th>
                                <th scope="col">Wali Kelas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td>{{Session::get('nkelas')}}</td>
                                <td>{{Session::get('tkelas')}}</td>
                                <td>{{Session::get('namawali')}}</td>
                                </tr>
                                
                            </tbody>
                            </table>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                          <div class="info-box">
                            {{-- <span class="info-box-icon bg-info elevation-1"><i class="fas fa-smile"></i></span> --}}
                            <div class="info-box-content">
                              <span class="info-box-text">Main Course Favorit</span>
                              <span class="info-box-number textUserOnline">Nasi Goreng</span>
                            </div>
                          </div>
                        </div>
              
                        <div class="col-12 col-sm-6 col-md-3">
                          <div class="info-box mb-3">
                            {{-- <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-sign-language"></i></span> --}}
                            <div class="info-box-content">
                              <span class="info-box-text">Snack Favorit</span>
                              <span class="info-box-number textTotalTransaction">Oreo</span>
                            </div>
                          </div>
                        </div>
              
                        <div class="clearfix hidden-md-up"></div>
              
                        <div class="col-12 col-sm-6 col-md-3">
                          <div class="info-box mb-3">
                            {{-- <span class="info-box-icon bg-success elevation-1"><i class="fas fa-comments-dollar"></i></span> --}}
                            <div class="info-box-content">
                              <span class="info-box-text">Main Course Kurang Favorit</span>
                              <span class="info-box-number textTotalOmset">Mie Goreng</span>
                            </div>
                          </div>
                        </div>
              
                        <div class="col-12 col-sm-6 col-md-3">
                          <div class="info-box mb-3">
                            {{-- <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-hand-holding-usd"></i></span> --}}
                            <div class="info-box-content">
                              <span class="info-box-text">Snack Kurang Favorit</span>
                              <span class="info-box-number textTotalProfit">Permen</span>
                            </div>
                          </div>
                        </div>
                      </div>
                @else
                    <a href="{{ url('/login') }}" class="btn btn-primary">Login</a>
                @endif
    </main>
@endsection

