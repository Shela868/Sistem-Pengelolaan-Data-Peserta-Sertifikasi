@extends('layouts.main')@section('content')
<br>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1><a href="/download"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i>Generate Report</a>
    </div><!-- Content Row --> --}}
    <div class="row">

        <!-- Earnings(Monthly)Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Peserta
                                Sertifikasi
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahdata }}</div>
                        </div>
                        <div class="col-auto"><i class="fas  fa-user-tie fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div><!-- Earnings(Monthly)Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Peserta
                                Kompeten
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $K }}</div>
                        </div>
                        <div class="col-auto"><i class="fas fa-check fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div><!-- Earnings(Monthly)Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Peserta Belum
                                Kompeten</div>
                            <div class="row no-gutters align-items-center">
                                <div>
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-700">{{ $BK }}</div>
                                </div>
                                <div class="col">
                                    <!-- <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width:40%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="90"></div>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                        <div class="col-auto"><i class="fas fa-question fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div><!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Admin
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $admin }}</div>
                        </div>
                        <div class="col-auto"><i class="fas fa-comments fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Content Row -->
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-6 col-lg-5">
            <div class="card shadow mb-3">
                <!-- Card Header-Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Jumlah Asesmen Berdasarkan Asesor</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">

                    {!! $asesorChart->container() !!}

                </div>
            </div>
        </div><!-- Pie Chart -->
        <div class="col-xl-5 col-md-6 col-lg-3">
            <div class="card shadow mb-2">
                 <!-- Card Header-Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Jumlah Asesmen Berdasarkan Jenis Kelamin</h6>

                </div><!-- Card Body -->
                <div class="card-body">
                        {!! $jenis_kelaminchart->container() !!}
                    </div><br>

                </div>
            </div>
        </div>
    </div><!-- Content Row  -->
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-6 mb-5">
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kanwil Yogyakarta</h6>
                </div>
                <div class="card-body">

                    {!! $adminchart->container() !!}
                </div>
            </div>
              <!-- Chart Kanwil Surabaya-->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kanwil Malang</h6>
                </div>
                <div class="card-body">
                    {!! $malangchart->container() !!}
                </div>
            </div>


        </div>
        <div class="col-lg-6 mb-4">
            <!-- Chart Kanwil Semarang-->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kanwil Semarang</h6>
                </div>
                <div class="card-body">
                    {!! $semarangChart->container() !!}
                </div>
                <body class="h-screen bg-gray-100">
            </div>
            <!-- Chart Kanwil Surabaya-->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kanwil Surabaya</h6>
                </div>
                <div class="card-body">
                    {!! $surabayachart->container() !!}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection

@section('footer')
<script src="{{ $asesorChart->cdn() }}"></script>
{{ $asesorChart->script() }}
<script src="{{ $adminchart->cdn() }}"></script>
{{ $adminchart->script() }}
<script src="{{ $semarangChart->cdn() }}"></script>
{{ $semarangChart->script() }}
<script src="{{ $surabayachart->cdn() }}"></script>
{{ $surabayachart->script() }}
<script src="{{ $malangchart->cdn() }}"></script>
{{ $malangchart->script() }}
<script src="{{ $jenis_kelaminchart->cdn() }}"></script>
{{ $jenis_kelaminchart->script() }}
@endsection
