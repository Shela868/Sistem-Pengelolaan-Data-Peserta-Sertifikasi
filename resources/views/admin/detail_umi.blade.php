@extends('layouts/main')
@section('content')

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

                                            <div class="btn-group float-end shadow" role="group"
                                                aria-label="Basic mixed styles example">
                                                <a href="/mitra_umi/{{ $asesmen->id }}/edit"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-fw fa-solid fa-pen"></i> Edit
                                                </a>
                                                <a href="/mitra_umi/{{ $asesmen->id }}/delete"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('yakin,dihapus??')">
                                                    <i class="fas fa-fw fa-regular fa-trash"></i> hapus

                                                </a>
                                                <a href="/cetak/{{ $asesmen->id }}"
                                                    class="btn btn-info btn-sm"  >
                                                    <i class="fas fa-fw fa-solid fa-print"></i>
                                                </a>


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

@endsection
