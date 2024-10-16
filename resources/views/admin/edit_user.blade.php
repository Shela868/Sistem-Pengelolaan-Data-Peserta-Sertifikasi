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
                                <form action="/users/{{ $users->id }}" method="POST" enctype="multipart/form-data">
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
                                        name="id" value="{{ old('id') ?? $users->id }}">
                                    @error('id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div> <br>
                                <div class="col-sm-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="name" value="{{ old('name') ?? $users->name }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div> <br>
                                <div class="col-sm-3">
                                    <label for="exampleInputEmail1" class="form-label">NIK</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        name="NIK" value="{{ old('NIK') ?? $users->NIK }}">
                                    @error('NIK')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="email" value="{{ old('email') ?? $users->email }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-select">
                                        <option value="L"
                                            {{ old('jenis_kelamin', $users->jenis_kelamin) == 'L' ? 'selected' : '' }}>
                                            Laki-laki</option>
                                        <option value="P"
                                            {{ old('jenis_kelamin', $users->jenis_kelamin) == 'P' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1" class="form-label">Telpon/HP</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        name="HP" value="{{ old('HP') ?? $users->HP }}">
                                    @error('HP')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-3">
                                    <label for="exampleInputEmail1" class="form-label">Role</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        name="role" value="{{ old('role') ?? $users->role }}">
                                </div>
                            </div>

                            <div class="input-group  ">
                                <div class="col-sm-4  ">
                                    <label for="exampleInputEmail1" class="form-label">Ganti Photo</label><br>
                                    @if ($users->image != '')
                                        <img alt="User Pic" src="{{ asset('storage/photo/' . $users->image) }}"
                                            class="image " width="160px" height="160px" border-radius="10%"
                                            vertical-align="middle">
                                    @else
                                        <img alt="User Pic" src="{{ asset('img/images.png') }}" class="image "
                                            width="160px" height="160px" border-radius="10%" vertical-align="middle">
                                    @endif
                                    <input type="file" class="form-control" id="photo" name="photo"
                                        src="{{ asset('storage/photo/' . $users->image) }}">
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
@endsection


{{-- @extends('layouts.main')@section('content')
<div class="container-fluid shadow">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-6 col-md-10">
            <div class="card-body p-0 ===">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="p-5">
                        <div class="text-center">
                            <form action="/users/{{ $user->id }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                                    <h3 class="m-0 font-weight-bold text-info">EDIT DATA</h3>
                                </div>
                            </div>
                            <br><br>

                                <div class="form-group row">
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="id"
                                            name="id" value="{{old('id')?? $users->id }}">
                                            @error('unit')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-user" id="name"
                                            name="name" value="{{old('name') ?? $users->name }}">
                                            @error('unit')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div> <br>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-user" id="email"
                                            name="email" value="{{old('email')?? $users->email }}">
                                            @error('unit')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div><br>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="NIK"
                                            name="" placeholder=" NIK" value="{{old('NIK')?? $users->NIK }}">
                                            @error('unit')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div> <br>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="role"
                                            name="role" value="{{old('role')?? $users->role }}">
                                            @error('unit')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>

                                <div class="modal-footer">
                                    <a href="/users "><button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button></a>
                                    <button type="submit" class="btn btn-info">Submit</button>
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
@endsection --}}
