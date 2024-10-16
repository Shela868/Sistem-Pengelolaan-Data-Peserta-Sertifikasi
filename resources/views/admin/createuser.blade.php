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
                                <form action="users/store" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                                        <h3 class="m-0 font-weight-bold text-info">TAMBAH DATA BARU</h3>
                                    </div>
                            </div>




                            <br><br>


                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="id" class="form-label">ID</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="id" placeholder=" ID">
                                    @error('id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div><br>
                                <div class="col-sm-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="name" >
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div> <br>
                                <div class="col-sm-3">
                                    <label for="exampleInputEmail1" class="form-label">NIK</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        name="NIK" >
                                    @error('NIK')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="email" >
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-4 mb-sm-0">
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
                                <div class="col-sm-3">
                                    <label for="exampleInputEmail1" class="form-label">Telpon/HP</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        name="HP" >
                                        @error('HP')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-3">
                                    <label for="exampleInputEmail1" class="form-label">Role</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        name="role">
                                </div>
                            </div>

                            <div class="input-group  ">
                                <div class="col-sm-4">
                                    <label for="photo" class="form-label">upload photo</label>
                                    <input type="file" class="form-control" id="photo" name="photo">
                                </div>
                            </div><br>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Submit</button>
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



