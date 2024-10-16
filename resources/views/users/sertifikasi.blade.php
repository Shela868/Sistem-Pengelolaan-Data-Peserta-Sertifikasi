@extends('layouts/app')
@section('content')
<section id="name" class="hero bg-light">
    <div class="container">
        <div class="main-body">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow" data-aos="fade-up" data-aos-delay="200">
                        <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            @if (Auth::user()->asesmen->image != "")
                                <img alt="User Pic"
                                    src="{{ asset('storage/photo/' . Auth::user()->asesmen->image) }}"
                                     class="rounded-circle p-1 bg-info" width="230"
                                    height="230px" border-radius="50%" vertical-align="middle">
                            @else
                                <img alt="User Pic" src="{{ asset('img/images.png') }}"
                                    id="profile-image1" class="img-circle img-responsive">
                            @endif

                            <div class="mt-3">

                                <h2 class="text-secondary">{{ Auth::user()->asesmen->nama_lengkap }}</h2>
                                <p class="text-secondary mb-1">{{ Auth::user()->asesmen->nik }}</p>
                                @if (Auth::user()->asesmen->jenis_kelamin != 'P')
                                    <p class="text-secondary mb-1">Laki-laki</p>
                                @elseif(Auth::user()->asesmen->jenis_kelamin != 'L')
                                    <p class="text-secondary mb-1">Perempuan</p>
                                @endif
                                <div class="badge bg-info text-wrap-30" style="width: 10rem;">
                                    {{ Auth::user()->asesmen->mid }}
                                    @if (Auth::user()->asesmen->keputusan_asesmen != 'K')
                                        <p class="text mb-1">Belum Kompeten</p>
                                    @elseif(Auth::user()->asesmen->jenis_kelamin != 'BK')
                                        <p class="text mb-1">Kompeten</p>
                                    @endif

                                </div>
                                <hr>
                                {{-- <div class="d-flex justify-content-center justify-content-lg-start">
                                    <a href="/sertifikasi" class="btn-get-started">Get Started</a> --}}
                                <a @if (Auth::user()->asesmen->blanko!= "") href="{{ asset('storage/sertifikat/' . Auth::user()->asesmen->blanko) }}"
                                  @else onclick="alert('{{ Auth::user()->asesmen->nama_lengkap }} Tidak memiliki Sertifikat')"
                                  @endif
                                    class="btn-get-started bg-info"><i
                                        class="fas fa-fw fa-solid fa-receipt"></i>
                                    Sertifikat </a>
                                    </div>
                            </div>
                        </div>
                  </div>
                    </div>
                                    <div class=" position-relative bg-light">
                                        <div class="container position-relative">
                                          <div class="row gy-4 mt-5">
                                            <div class="col-xl-3 col-md-6 " data-aos="fade-up" data-aos-delay="100">
                                              <div class="icon-box bg-info">
                                                <h4 class="title"><a href="" class="stretched-link">TUK</a></h4>
                                                <div class="icon "><i class="bi bi-map-fill"></i></div>
                                                <div class="col-sm-20 text-secondary">
                                                    {{ Auth::user()->asesmen->tuk }}
                                                </div>
                                              </div>
                                            </div>
                                            <!--End Icon Box -->

                                            <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                                              <div class="icon-box  bg-info">
                                                <h4 class="title"><a href="" class="stretched-link">KC</a></h4>
                                                <div class="icon "><i class="bi bi-buildings-fill"></i></div>
                                                <div class="col-sm-20 text-secondary">
                                                    {{ Auth::user()->asesmen->kc }}
                                                </div>
                                              </div>
                                            </div>
                                            <!--End Icon Box -->

                                            <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                                              <div class="icon-box bg-info">
                                                <h4 class="title"><a href="" class="stretched-link">Unit BRI</a></h4>
                                                <div class="icon"><i class="bi bi-building-fill"></i></div>
                                                <div class="col-sm-20 text-secondary">
                                                    {{ Auth::user()->asesmen->unit }}
                                                </div>
                                              </div>
                                            </div>
                                            <!--End Icon Box -->

                                            <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
                                              <div class="icon-box bg-info">
                                                <h4 class="title"><a href="" class="stretched-link">Nama Toko</a></h4>
                                                <div class="icon"><i class="bi bi-shop"></i></div>
                                                <div class="col-sm-20 text-secondary">
                                                    {{ Auth::user()->asesmen->nama_toko }}
                                                </div>
                                              </div>
                                            </div>
                                            <!--End Icon Box -->

                                          </div>
                                        </div>
                                      </div>
                </div>
<br>
                            <div class="row gutters-sm justify-content-center">
                            <div class="col-sm-6 mb-3">
                                <div class="card shadow h-100 bg-info" data-aos="fade-up" data-aos-delay="300">
                                    <div class="card-body ">
                                        <h6>Start Event</h6>
                                        <div class="col-sm-20 text-secondary">
                                            {{ Auth::user()->asesmen->start_event }}
                                        </div><br>

                                        <h6>No Registrasi</h6>
                                        <div class="col-sm-20 text-secondary">
                                            {{ Auth::user()->asesmen->no_registrasi }}
                                        </div><br>
                                        <h6>Kode Jadwal</h6>
                                        <div class="col-sm-20 text-secondary">
                                            {{ Auth::user()->asesmen->kode_jadwal }}
                                        </div><br>
                                        <h6>Nama Asesor</h6>
                                        <div class="col-sm-20 text-secondary">
                                            {{ Auth::user()->asesmen->nama_asesor }}
                                        </div><br>
                                        <h6>Instansi Pemberi  Anggaran</h6>
                                        <div class="col-sm-20 text-secondary">
                                            {{ Auth::user()->asesmen->instansi->instansi }}
                                        </div><br>
                                        <h6>Sumber Anggaran </h6>
                                        <div class="col-sm-20 text-secondary">
                                            {{ Auth::user()->asesmen->anggaran->sumber_anggaran }}
                                        </div><br>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 mb-4">
                                <div class="card shadow h-100 bg-info" data-aos="fade-down" data-aos-delay="400">
                                    <div class="card-body">
                                        <h6>Pendidikan</h6>
                                        <div class="col-sm-20 text-secondary">
                                            {{ Auth::user()->asesmen->pendidikan->pendidikan }}
                                        </div><br>
                                        <h6>Pekerjaan</h6>
                                        <div class="col-sm-20 text-secondary">
                                            {{ Auth::user()->asesmen->pekerjaan->pekerjaan }}
                                        </div><br>
                                        <h6>Provinsi</h6>
                                        <div class="col-sm-20 text-secondary">
                                            {{ Auth::user()->asesmen->Provinsi_id->provinsi}}
                                        </div><br>
                                        <h6>Kabupaten</h6>
                                        <div class="col-sm-20 text-secondary">
                                            {{ Auth::user()->asesmen->kabupaten_id->kabupaten }}
                                        </div><br>
                                        <h6>Alamat Rumah</h6>
                                        <div class="col-sm-20 text-secondary">
                                            {{ Auth::user()->asesmen->alamat_rumah }}
                                        </div><br>
                                    </div>
                                </div>

                            </div>
                        </div>

                            </div>
                            </div>
                            </div>
                        </div>
                    </div>








        </div>
      </div>
    </div>

@endsection
