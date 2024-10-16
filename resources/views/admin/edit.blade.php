@extends('layouts/main')
@section('content')
    <div class="container-fluid shadow">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-6 col-md-10">

                <div class="card-body p-0 ===">
                    <!-- Nested Row within Card Body -->
                    <div class="row justify-content-center">
                        <div class="p-5">
                            <div class="text-center">
                                <form action="/mitra_umi/{{ $asesmen->id }}" method="POST" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                                        <h3 class="m-0 font-weight-bold text-info">EDIT DATA</h3>
                                    </div>
                            </div>




                            <br><br>


                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="id" class="form-label">ID/NO</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="id" value="{{ old('id') ?? $asesmen->id }}">
                                    @error('id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div> <br>
                                <div class="col-sm-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="nama_lengkap" value="{{ old('nama_lengkap') ?? $asesmen->nama_lengkap }}">
                                    @error('nama_lengkap')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div> <br>
                                <div class="col-sm-3">
                                    <label for="exampleInputEmail1" class="form-label">NIK</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        name="nik" value="{{ old('nik') ?? $asesmen->nik }}">
                                    @error('nik')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-3">
                                    <label for="exampleInputEmail1" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="tempat_lahir" value="{{ old('tempat_lahir') ?? $asesmen->tempat_lahir }}">
                                    @error('tempat_lahir')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        name="tgl_lahir" value="{{ old('tgl_lahir') ?? $asesmen->tgl_lahir }}">
                                    @error('tgl_lahir')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                               <div class="col-sm-4">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-select">
                                        <option value="L" {{ old('jenis_kelamin', $asesmen->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="P" {{ old('jenis_kelamin', $asesmen->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                {{-- <div class="col-sm-4">
                                    <label for="" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                                        name="jenis_kelamin">
                                        <option>pilih jenis kelamin</option>
                                        <option value=" L" @if ($asesmen->jenis_kelamin == 'L') selected @endif>Laki-Laki
                                        </option>
                                        <option value="P" @if ($asesmen->jenis_kelamin == 'P') selected @endif>Perempuan
                                        </option>
                                    </select>
                                </div> --}}

                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        name="email" value="{{ old('email') ?? $asesmen->email }}">
                                </div>
                            </div>


                            <label for="exampleInputEmail1" class="form-label">Alamat Rumah</label><br>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" cols="130" name="alamat_rumah"
                                placeholder="Alamat Rumah">{{ old('alamat_rumah') ?? $asesmen->alamat_rumah }}</textarea>
                            @error('alamat_rumah')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <br><br>

                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="kabupaten" class="form-label">Kabupaten </label>
                                    <select class="form-select form-control-select2" id="kabupaten" name="kabupaten">
                                        <option value="{{ $asesmen->kabupaten }}">{{ $asesmen->kabupaten_id->kabupaten }}
                                        </option>
                                        @foreach ($kabupaten as $kab)
                                            <option value="{{ $kab->id }}"
                                                {{ old('kabupaten') == $kab->id ? 'selected' : null }}>
                                                {{ $kab->kabupaten }}</option>
                                        @endforeach
                                    </select>
                                    @error('kabupaten')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div> <br>
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1" class="form-label">Provinsi</label>
                                    <select class="form-select form-control-select2" id="provinsi" name="provinsi">
                                        <option value="{{ $asesmen->provinsi }}">{{ $asesmen->provinsi_id->provinsi }}
                                        </option>
                                        @foreach ($provinsi as $prov)
                                            <option value="{{ $prov->id }}"
                                                {{ old('provinsi') == $prov->id ? 'selected' : null }}>
                                                {{ $prov->provinsi }}</option>
                                        @endforeach
                                    </select>
                                    @error('provinsi')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div><br>

                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1" class="form-label">Telpon/HP </label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="telp_hp" value="{{ old('telp_hp') ?? $asesmen->telp_hp }}">
                                    @error('telp_hp')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> <br>
                            <br>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="exampleInputEmail1" class="form-label">Pendidikan ID</label>
                                    <select class="form-select form-control-select2" id="pendidikan_id"
                                        name="pendidikan_id">
                                        <option value="{{ $asesmen->pendidikan_id }}">
                                            {{ $asesmen->pendidikan->pendidikan }}</option>
                                        @foreach ($pendidikan as $pend)
                                            <option value="{{ $pend->id }}"
                                                {{ old('pendidikan_id') == $pend->id ? 'selected' : null }}>
                                                {{ $pend->pendidikan }}</option>
                                        @endforeach
                                    </select>
                                    @error('pendidikan_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div> <br>
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1" class="form-label">Pekerjaan</label>
                                    <select class="form-select form-control-select2" id="kode_pekerjaan"
                                        name="kode_pekerjaan">
                                        <option value="{{ $asesmen->kode_pekerjaan }}">
                                            {{ $asesmen->pekerjaan->pekerjaan }}</option>
                                        @foreach ($pekerjaan as $pek)
                                            <option value="{{ $pek->id }}"
                                                {{ old('kode_pekerjaan') == $pek->id ? 'selected' : null }}>
                                                {{ $pek->pekerjaan }}</option>
                                        @endforeach
                                    </select>
                                    @error('kode_pekerjaan')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1" class="form-label">Kode_Jadwal</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="kode_jadwal" value="{{ old('kode_jadwal') ?? $asesmen->kode_jadwal }}">
                                    @error('kode_jadwal')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><br>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="exampleInputEmail1" class="form-label">Start Event</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        name="start_event" value="{{ old('start_event') ?? $asesmen->start_event }}">
                                    @error('start_event')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1" class="form-label">No Registrasi</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="no_registrasi"
                                        value="{{ old('no_registrasi') ?? $asesmen->no_registrasi }}">
                                    @error('no_registrasi')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1" class="form-label">Nama Asesor</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="nama_asesor" value="{{ old('nama_asesor') ?? $asesmen->nama_asesor }}">
                                    @error('nama_asesor')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><br>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="exampleInputEmail1" class="form-label">Sumber Anggaran</label>
                                    <select class="form-select form-control-select2" id="sumber_anggaran_id"
                                        name="sumber_anggaran_id">
                                        <option value="{{ $asesmen->sumber_anggaran_id }}">
                                            {{ $asesmen->anggaran->sumber_anggaran }}</option>
                                        @foreach ($anggaran as $ang)
                                            <option value="{{ $ang->id }}"
                                                {{ old('sumber_anggaran_id') == $ang->id ? 'selected' : null }}>
                                                {{ $ang->sumber_anggaran }}</option>
                                        @endforeach
                                    </select>
                                    @error('sumber_anggaran_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1" class="form-label">Instansi Pemberi Anggaran</label>
                                    <select type="text" class="form-select select2" id="select2" name="select2">
                                        <option value="{{ $asesmen->instansi_id }}">{{ $asesmen->instansi->instansi }}
                                        </option>
                                        @foreach ($instansi as $ins)
                                            <option value="{{ $ins->id }}"
                                                {{ old('instansi_id') == $ins->id ? 'selected' : null }}>
                                                {{ $ins->instansi }}</option>
                                        @endforeach
                                    </select>
                                    @error('instansi_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="keputusan_asesmen">Keputusan Asesmen</label>
                                    <select name="keputusan_asesmen" id="keputusan_asesmen" class="form-control form-select">
                                        <option value="K" {{ old('keputusan_asesmen', $asesmen->keputusan_asesmen) == 'K' ? 'selected' : '' }}>Kompeten</option>
                                        <option value="BK" {{ old('keputusan_asesmen', $asesmen->keputusan_asesmen) == 'BK' ? 'selected' : '' }}>Belum Kompeten</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <br>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="exampleInputEmail1" class="form-label">TUK</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="tuk" value="{{ old('tuk') ?? $asesmen->tuk }}">
                                </div>
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1" class="form-label">No blanko</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="no_blanko" value="{{ old('no_blanko') ?? $asesmen->no_blanko }}">
                                </div>
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1" class="form-label">MID</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="mid" value="{{ old('mid') ?? $asesmen->mid }}">
                                </div>
                                <br>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="exampleInputEmail1" class="form-label">Nama Toko</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        name="nama_toko" value="{{ old('nama_toko') ?? $asesmen->nama_toko }}">
                                </div>
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1" class="form-label">KC</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="kc" value="{{ old('kc') ?? $asesmen->kc }}">
                                    @error('kc')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1" class="form-label">UNIT</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="unit" value="{{ old('unit') ?? $asesmen->unit }}">
                                    @error('unit')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <br>
                            </div>
                            <div class="input-group  ">
                                <div class="col-sm-4  ">
                                    <label for="exampleInputEmail1" class="form-label">upload blanko</label>
                                    <input type="file" class="form-control" id="sertifikat" name="sertifikat"
                                        src="{{ asset('storage/sertifikat/' . $asesmen->blanko) }}" accept=".pdf,"
                                        value="{{ $asesmen->blanko }}">
                                </div>

                                <div class="col-sm-4  ">
                                    <label for="exampleInputEmail1" class="form-label">Ganti Photo</label>
                                    <br>
                                    @if ($asesmen->image != "")
                                    <img alt="User Pic"
                                        src="{{ asset('storage/photo/' . $asesmen->image) }}"
                                         class="image " width="160px"
                                        height="160px" border-radius="10%" vertical-align="middle">
                                @else
                                    <img alt="User Pic" src="{{ asset('img/images.png') }}"
                                    class="image " width="160px"
                                    height="160px" border-radius="10%" vertical-align="middle">
                                @endif
                                    <input type="file" class="form-control" id="photo" name="photo"
                                        src="{{ asset('storage/photo/' . $asesmen->image) }}">
                                </div>

                            </div><br>


                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Update</button>
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
    </div>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script>
      $(document).ready(function() {
        $('.select2').select2();
      });
    </script>
@endsection
