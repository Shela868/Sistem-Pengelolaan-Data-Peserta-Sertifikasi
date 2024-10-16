@extends('layouts/main')
@section('content')
    <div class="container-fluid">
        @if (session('sukses'))
            <div class="alert alert-warning" role="alert">
                {{ session('sukses') }}
            </div>
        @endif
        <!-- DataTales import -->
        <br>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info">Table Peserta<h6><br>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-left">
                            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-8 my-2 my-md-0 mw-100 "
                                method="GET" action="/mitra_umi">
                                <div class="input-group">
                                    <select name="tuk" id="filter_tuk" class="form-control" onchange="filter()">
                                        <option value=""><b>Pilih TUK</b></option>
                                        <option value=""><b>Semua TUK</b></option>
                                        <option
                                            value="Yogyakarta"{{ Request::get('tuk') == 'Yogyakarta' ? 'selected' : '' }}>
                                            Yogyakarta</option>
                                        <option value="Solo"{{ Request::get('tuk') == 'Solo' ? 'selected' : '' }}>Solo
                                        </option>
                                        <option
                                            value="Purbalingga"{{ Request::get('tuk') == 'Purbalingga' ? 'selected' : '' }}>
                                            Purbalingga</option>
                                        <option value="Semarang"{{ Request::get('tuk') == 'Semarang' ? 'selected' : '' }}>
                                            Semarang
                                        </option>
                                        <option value="Purwodadi"{{ Request::get('tuk') == 'Purwodadi' ? 'selected' : '' }}>
                                            Purwodadi</option>
                                        <option value="Blora"{{ Request::get('tuk') == 'Blora' ? 'selected' : '' }}>Blora
                                        </option>
                                        <option value="Tegal"{{ Request::get('tuk') == 'Tegal' ? 'selected' : '' }}>Tegal
                                        </option>
                                        <option
                                            value="Pekalogan"{{ Request::get('tuk') == 'Pekalongan' ? 'selected' : '' }}>
                                            Pekalongan</option>
                                        <option value="Best Kanwil"{{ Request::get('tuk') == 'Best k' ? 'selected' : '' }}>
                                            Best
                                            Kanwil</option>
                                        <option value="Kudus"{{ Request::get('tuk') == 'Kudus' ? 'selected' : '' }}>Kudus
                                        </option>
                                        <option value="Pati"{{ Request::get('tuk') == 'Pati' ? 'selected' : '' }}>Pati
                                        </option>
                                        <option value="Sendik"{{ Request::get('tuk') == 'Sendik' ? 'selected' : '' }}>
                                            Sendik
                                        </option>
                                        <option
                                            value="Bangkalan"{{ Request::get('tuk') == 'Bangkalan' ? 'selected' : '' }}>
                                            Bangkalan</option>
                                        <option
                                            value="Mojokerto"{{ Request::get('tuk') == 'Mojokerto' ? 'selected' : '' }}>
                                            Mojokerto</option>
                                        <option value="Lamongan"{{ Request::get('tuk') == 'Lamongan' ? 'selected' : '' }}>
                                            Lamongan
                                        </option>
                                        <option
                                            value="Bojonegoro"{{ Request::get('tuk') == 'Bojonegoro' ? 'selected' : '' }}>
                                            Bojonegoro</option>
                                        <option value="Kediri"{{ Request::get('tuk') == 'Kediri' ? 'selected' : '' }}>
                                            Kediri
                                        </option>
                                        <option value="Nganjuk"{{ Request::get('tuk') == 'Nganjuk' ? 'selected' : '' }}>
                                            Nganjuk
                                        </option>
                                        <option value="Madiun"{{ Request::get('tuk') == 'Madiun' ? 'selected' : '' }}>
                                            Madiun
                                        </option>
                                        <option value="Jember"{{ Request::get('tuk') == 'Jember' ? 'selected' : '' }}>
                                            Jember
                                        </option>
                                        <option value="Malang"{{ Request::get('tuk') == 'Malang' ? 'selected' : '' }}>
                                            Malang
                                        </option>
                                        <option value="Pemalang"{{ Request::get('tuk') == 'Pemalang' ? 'selected' : '' }}>
                                            Pemalang
                                        </option>
                                        <option value="pemalang"{{ request::get('tuk') == 'pemlang' ? 'selected' : ''}}></option>
                                    </select>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-info">Cari TUK</button>
                                    </div>
                                </div>
                            </form>
                            {{-- tombol template --}}
                            <a href="/mitra_umi/export">
                                <button type="button" class="btn btn-info ">
                                    Tempalte Excel
                                </button></a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                data-bs-target="#importModal">
                                import
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="importModalLabel">Import data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('mitraumi.import') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">upload data</label>
                                                    <div class="text text-danger">
                                                        <p>1. Pastikan file yang diimport memiliki format "XLSX atau CSV"
                                                            yang berjumlah 26 kolom <br>
                                                            2. Pastikan NIK dan NO/ID tidak sama pada data yang sudah diinput
                                                        </p>
                                                    </div>
                                                    <input class="form-control" type="file" name="file">
                                                    @error('file')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Button trigger create -->
                            <a href="/mitra_umi/create">
                                <button type="button" class="btn btn-info ">
                                    <i class="fas fa-fw fa-plus"></i>
                                </button></a>
                        </div>
            </div>
            {{-- tabel --}}
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table- bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <div class="container text-align-center">
                                <table class="table table-bordered  border-default table-hover" id="datatable">
                                    <thead class="table-default">
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>MID</th>
                                            <th>Nama Lengkap</th>
                                            <th>NIK</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>HP</th>
                                            <th>Unit</th>
                                            <th>KC</th>
                                            <th>TUK</th>
                                            <th>HUK</th>
                                        </tr>
                                    </thead>
                                    @foreach ($asesmen as $a)
                                        <tr class="text-center">
                                            <td>{{ $a->id }}</td>
                                            <td>{{ $a->mid }}</td>
                                            <td> <a class="nav nav-link"
                                                    href='/mitra_umi/{{ $a->id }}/detail'>{{ $a->nama_lengkap }}</a>
                                            </td>
                                            <td>{{ $a->nik }}</td>
                                            <td>{{ $a->jenis_kelamin }}</td>
                                            <td>{{ $a->tempat_lahir }}</td>
                                            <td>{{ $a->tgl_lahir }}</td>
                                            <td>{{ $a->telp_hp }}</td>
                                            <td>{{ $a->unit }}</td>
                                            <td>{{ $a->kc }}</td>
                                            <td>{{ $a->tuk }}</td>
                                            <td>{{ $a->keputusan_asesmen }}</td>
                            </div>
                            </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        @endsection
        {{-- datatables --}}
        @section('footer')
            <script type="text/javascript">
                $(document).ready(function() {
                    var table = $('#datatable').DataTable({
                        dom: 'C<"clear">Bfrtip',
                        buttons: ['copy', 'csv', 'excel', 'print'],

                    });
                });
            </script>
        @endsection
