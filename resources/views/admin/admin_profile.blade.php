@extends('layouts.main')

@section('content')
<br>
<div class="container">

    <div class="main-body">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            @if ($user->image != "")
                            <img alt="User Pic"
                                src="{{ asset('storage/photo/' . $user->image) }}"
                                 class="rounded-circle p-1 bg-info" width="230"
                                height="230px" border-radius="50%" vertical-align="middle">
                        @else
                            <img alt="User Pic" src="{{ asset('img/images.png') }}"
                                id="profile-image1" class="img-circle img-responsive">
                        @endif
                            <div class="mt-3">
                                <h4>{{$user->name }}</h4>
                                <p class="text-secondary mb-1">Anda Adalah  {{ $user->role }}</p>
                            </div>
                        </div>
                        <hr class="my-4">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>NIK</h6>
                                <span class="text-secondary">{{ Auth::user()->NIK }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>Jenis Kelamin</h6>
                                @if (Auth::user()->jenis_kelamin='P')
                                <span class="text-secondary">Perempuan</span>
                                @elseif (Auth::user()->jenis_kelamin='L')

                                @endif

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>Email</h6>
                                <span class="text-secondary">{{ Auth::user()->email }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>Telpon/HP</h6>
                                <span class="text-secondary">{{ Auth::user()->HP }}</span>
                            </li>
                        </ul><hr>
                        <div class="col-sm-1"></div>
                        <div class="btn-group float-end" role="group"
                        aria-label="Basic mixed styles example">
                        <a href="/users/{{$user->id }}/edit" class="btn btn-warning btn-sm md">
                            <i class="fas fa-fw fa-solid fa-pen">  </i> Edit
                         </a>
                         @if (Route::has('password.request'))
                         <a class="btn btn-primary btn-sm md " href="{{ route('password.request') }}">
                            <i class="fas fa-fw fa-solid fa-arrows"></i>{{ __('Ganti password') }}
                         </a>

                         @endif
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->name }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                               {{$user->email }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">NIK</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->NIK}}
                             </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Jenis Kelamin</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->jenis_kelamin}}
                             </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Telpon/HP</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->HP}}
                             </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-1"></div>
                            <div class="btn-group float-center" role="group"
                            aria-label="Basic mixed styles example">
                            <a href="/users/{{ $user->id }}/edit" class="btn btn-warning btn-sm md">
                                Edit <i class="fas fa-fw fa-solid fa-pen"></i>
                             </a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <br> --}}




                {{-- <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="d-flex align-items-center mb-3">Project Status</h5>
                                <p>Web Design</p>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>Website Markup</p>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>One Page</p>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>Mobile Template</p>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>Backend API</p>
                                <div class="progress" style="height: 5px">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    @endsection
