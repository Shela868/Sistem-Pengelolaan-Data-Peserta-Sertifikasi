<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>id card print</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js" />
</head>

<body id="page-top">

    <div class="container">
        <!-- Nested Row within Card Body -->
        <div class="row justify-content-center">
            <div class="p-5">
                <div class="text-center">
                    <div class="card-body ">
                        <div id="printableArea">
                        <form action="" method="GET">

                            <div class="container">
                                <div class="main-body">
                                    <div class="row gutters-sm">
                                        <div class="col-md-4 mb-3">
                                            <div class="card  shadow ">
                                                <div class="card-body">
                                                    <div class="d-flex flex-column align-items-center text-center">
                                                        @if ($asesmen->image != "")
                                                            <img alt="User Pic"
                                                                src="{{ asset('storage/photo/' . $asesmen->image) }}"
                                                                 class="rounded-circle p-1 bg-info" width="230"
                                                                height="230px" border-radius="50%" vertical-align="middle">
                                                        @else
                                                            <img alt="User Pic" src="{{ asset('img/images.png') }}"
                                                                id="profile-image1" class="img-circle img-responsive">
                                                        @endif

                                                        <div class="mt-3">

                                                            <h2>{{ $asesmen->nama_lengkap }}</h2>
                                                            <p class="text-secondary mb-1">{{ $asesmen->nik }}</p>
                                                            @if ($asesmen->jenis_kelamin != 'P')
                                                                <p class="text-secondary mb-1">Laki-laki</p>
                                                            @elseif($asesmen->jenis_kelamin != 'L')
                                                                <p class="text-secondary mb-1">Perempuan</p>
                                                            @endif
                                                            <div class="badge bg-info text-wrap-30" style="width: 10rem;">
                                                                {{ $asesmen->mid }}
                                                                @if ($asesmen->keputusan_asesmen != 'K')
                                                                    <p class="text mb-1">Belum Kompeten</p>
                                                                @elseif($asesmen->jenis_kelamin != 'BK')
                                                                    <p class="text mb-1">Kompeten</p>
                                                                @endif

                                                            </div>
                                                            <hr>
                                                            <a @if ($asesmen->blanko!= "") href="{{ asset('storage/sertifikat/' . $asesmen->blanko) }}"
                                                              @else onclick="alert('{{ $asesmen->nama_lengkap }} Tidak memiliki Sertifikat')"
                                                              @endif
                                                                class="btn btn-info btn-sm"><i
                                                                    class="fas fa-fw fa-solid fa-receipt"></i>
                                                                Sertifikat </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card mt-3 shadow">
                                                <ul class="list-group list-group-flush">

                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        <h6 class="mb-0"><i class="fas fa-fw fa-solid fa-gift"></i>
                                                            Tanggal Lahir</h6>
                                                        <span class="text-secondary">{{ $asesmen->tgl_lahir }}</span>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        <h6 class="mb-0"><i class="fas fa-fw  fa-solid fa-house-user"></i>
                                                            Tempat Lahir</h6>
                                                        <span class="text-secondary">{{ $asesmen->tempat_lahir }}</span>
                                                    </li>

                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        <h6 class="mb-0"><i class="fas fa-fw fa-solid fa-envelope"></i>
                                                            Email</h6>
                                                        <span class="text-secondary">{{ $asesmen->email }}</span>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        <h6 class="mb-0"> <i class="fas fa-fw fa-solid fa-phone"
                                                                width="24" height="24"></i> Telpon/HP</h6>
                                                        <span class="text-secondary">{{ $asesmen->telp_hp }}</span>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        <h6 class="mb-0"><i class="fas fa-fw fa-solid fa-map"></i> TUK
                                                        </h6>
                                                        <span class="text-secondary">{{ $asesmen->tuk }}</span>
                                                    </li>

                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        <h6 class="mb-0"><i class="fas fa-fw fa-solid fa-building"></i>KC
                                                        </h6>
                                                        <span class="text-secondary">{{ $asesmen->kc }}</span>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        <h6 class="mb-0"><i class="fas fa-fw fa-solid fa-warehouse"></i>
                                                            Unit</h6>
                                                        <span class="text-secondary">{{ $asesmen->unit }}</span>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        <h6 class="mb-0"><i class="fas fa-fw fa-solid fa-store"></i>
                                                            Nama Toko</h6>
                                                        <span class="text-secondary">{{ $asesmen->nama_toko }}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card mb-3 shadow">
                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Pendidikan ID</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{$asesmen->pendidikan->pendidikan}}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Pekerjaan</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $asesmen->pekerjaan->pekerjaan }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">provinsi</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $asesmen->provinsi_id->provinsi }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Kabupaten</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $asesmen->kabupaten_id->kabupaten }}
                                                        </div>
                                                    </div>
                                                    <hr>


                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Alamat</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $asesmen->alamat_rumah }}
                                                        </div>
                                                    </div>
                                                    <hr>


                                                </div>
                                            </div>

                                            <div class="row gutters-sm">
                                                <div class="col-sm-6 mb-3">
                                                    <div class="card shadow h-100">
                                                        <div class="card-body">
                                                            <h6>Start Event</h6>
                                                            <div class="col-sm-20 text-secondary">
                                                                {{ $asesmen->start_event }}
                                                            </div><br>

                                                            <h6>No Registrasi</h6>
                                                            <div class="col-sm-20 text-secondary">
                                                                {{ $asesmen->no_registrasi }}
                                                            </div><br>
                                                            <h6>Kode Jadwal</h6>
                                                            <div class="col-sm-20 text-secondary">
                                                                {{ $asesmen->kode_jadwal }}
                                                            </div><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <div class="card shadow h-100">
                                                        <div class="card-body">

                                                            <h6>Nama Asesor</h6>
                                                            <div class="col-sm-20 text-secondary">
                                                                {{ $asesmen->nama_asesor }}
                                                            </div><br>
                                                            <h6>Instansi Pemberi  Anggaran</h6>
                                                            <div class="col-sm-20 text-secondary">
                                                                {{ $asesmen->instansi->instansi }}
                                                            </div><br>
                                                            <h6>Sumber Anggaran </h6>
                                                            <div class="col-sm-20 text-secondary">
                                                                {{ $asesmen->anggaran->sumber_anggaran }}
                                                            </div><br>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }</script> --}}


</body>
</html>
<script>
    window.print();
</script>





