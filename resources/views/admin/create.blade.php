@extends('layouts/main')
@section('content')
    {{-- <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">create new</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"></button>
        </div>
        <div class="modal-body"> --}}
    <div class="container-fluid shadow">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-6 col-md-10">

                <div class="card-body p-0 ===">
                    <!-- Nested Row within Card Body -->
                    <div class="row justify-content-center">
                        <div class="p-5">
                            <div class="text-center">
                                <form action="/mitra_umi/store" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                                        <h3 class="m-0 font-weight-bold text-info">TAMBAH DATA BARU</h3>
                                    </div>
                            </div><br>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="id" class="form-label">ID</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="id" placeholder=" ID">
                                    @error('id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div> <br>
                                <div class="col-sm-3">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        name="nama_lengkap" placeholder="Nama Lengkap">
                                    @error('nama_lengkap')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="nik" placeholder=" NIK">
                                    @error('nik')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        name="tempat_lahir" placeholder="Tempat lahir">
                                    @error('tempat_lahir')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="tgl_lahir" placeholder="Tanggal Lahir">
                                    @error('tgl_lahir')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div> <br>
                                <div class="col-sm-4">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control form-select">
                                        <option>Jenis Kelamin</option>
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        name="email" placeholder="Email">
                                </div>
                            </div><br>
                            <div class="mb-3">
                                <label for="alamat_rumah" class="form-label">Alamat Rumah</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" cols="130" name="alamat_rumah"
                                    placeholder="Alamat Rumah"></textarea>
                                @error('alamat_rumah')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div> <br>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="kabupaten" class="form-label">Kabupaten</label>
                                    <select type="text" class="form-control form-select " id="kabupaten"
                                        name="kabupaten">
                                        <option value="">Kabupaten</option>
                                        @foreach ($kabupaten as $kab)
                                            <option value="{{ $kab->id }}">{{ $kab->kabupaten }}</option>
                                        @endforeach
                                    </select>
                                    @error('kabupaten')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div> <br>
                                <div class="col-sm-4">
                                    <label for="provinsi" class="form-label">Provinsi</label>
                                    <select type="text" class="form-control form-select" id="provinsi" name="provinsi">
                                        <option value="">Provinsi</option>
                                        @foreach ($provinsi as $pro)
                                            <option value="{{ $pro->id }}">{{ $pro->provinsi }}</option>
                                        @endforeach
                                    </select>
                                    @error('provinsi')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="telp_hp" class="form-label">Telpon/HP</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        name="telp_hp" placeholder="Telpon/HP">
                                    @error('telp_hp')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> <br>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-4 mb-sm-0">
                                    <label for="pendidikan" class="form-label">Pendidikan</label>
                                    <select class="form-control form-select" id="pendidikan_id" name="pendidikan_id">
                                        <option value="">Pendidikan</option>
                                        @foreach ($pendidikan as $pen)
                                            <option value="{{ $pen->id }}">{{ $pen->pendidikan }}</option>
                                        @endforeach
                                    </select>
                                    @error('pendidikan_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div> <br>
                                <div class="col-sm-4">
                                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                    <select class="form-control form-select" id="kode_pekerjaan" name="kode_pekerjaan">
                                        <option value="">Pekerjaan</option>
                                        @foreach ($pekerjaan as $pek)
                                            <option value="{{ $pek->id }}">{{ $pek->pekerjaan }}</option>
                                        @endforeach
                                    </select>
                                    @error('kode_pekerjaan')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="kode_jadwal" class="form-label">Kode Jadwal</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="kode_jadwal" placeholder="Kode jadwal">
                                    @error('kode_jadwal')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><br>
                            <div class="form-group row">
                                <div class="col-sm-4  mb-3 mb-sm-0">
                                    <label for="start_event" class="form-label">Start Event</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        name="start_event" placeholder="Start Event">
                                    @error('start_event')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="no_registrasi" class="form-label">No Registrasi</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        name="no_registrasi" placeholder="No Registrasi">
                                    @error('no_registrasi')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-4 ">
                                    <label for="nama_asesor" class="form-label">Nama Asesor</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="nama_asesor" placeholder="Nama Asesor">
                                    @error('nama_asesor')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> <br>

                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="sumber_anggaran_id" class="form-label">Sumber Anggaran</label>
                                    <select type="text" class="form-control " id="sumber_anggaran_id"
                                        name="sumber_anggaran_id">
                                        <option value="">Sumber Anggaran ID</option>
                                        @foreach ($anggaran as $ang)
                                            <option value="{{ $ang->id }}">{{ $ang->sumber_anggaran }}</option>
                                        @endforeach
                                    </select>
                                    @error('sumber_anggaran_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="instansi_id" class="form-label">Instansi</label>
                                    <select type="text" class="form-control form-select" id="instansi_id"
                                        name="instansi_id">
                                        <option value="">Instansi</option>
                                        @foreach ($instansi as $ins)
                                            <option value="{{ $ins->id }}">{{ $ins->instansi }}</option>
                                        @endforeach
                                    </select>
                                    @error('instansi_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="blanko" class="form-label">Keputusan Asesmen</label>
                                    <select name="keputusan_asesmen" class="form-control form-select">
                                        <option>keputusan asesemen</option>
                                        <option value="K">Kompeten</option>
                                        <option value="BK">Belum Kompeten</option>
                                    </select>
                                    @error('keputusan_asesmen')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><br>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="tuk" class="form-label">TUK</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="tuk" placeholder="TUK">
                                    @error('tuk')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="blanko" class="form-label">NO Blanko</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        name="no_blanko" placeholder="No Blanko">
                                </div>
                                <div class="col-sm-4">
                                    <label for="mid" class="form-label">MID</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="mid" placeholder="MID">
                                </div>
                            </div><br>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="nama_toko" class="form-label">Nama Toko</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        name="nama_toko" placeholder="Nama Toko">
                                </div>
                                <div class="col-sm-4">
                                    <label for="kc" class="form-label">KC</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="kc" placeholder="KC">
                                    @error('kc')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div> <br>
                                <div class="col-sm-4">
                                    <label for="unit" class="form-label">Unit</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        name="unit" placeholder="Unit">
                                    @error('unit')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><br>
                            <div class="input-group ">
                                <div class="col-sm-4">
                                    <label for="photo" class="form-label">upload photo</label>
                                    <input type="file" class="form-control" id="photo" name="photo">
                                </div>
                                <div class="col-sm-4">
                                    <label for="blanko" class="form-label">upload blanko</label>
                                    <input type="file" class="form-control" id="sertifikat" name="sertifikat">
                                </div>
                            </div>
                            <br>
                            <div class="modal-footer">
                                <a href="/mitra_umi">
                                <button type="button" class="btn btn-secondary" > Close</button> </a>
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </form>
    @endsection
