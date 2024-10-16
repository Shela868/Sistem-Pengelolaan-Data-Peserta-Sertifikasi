@extends('layouts/main')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info">Tables Pengguna<h6>
            {{-- <div class="d-grid gap-2 d-md-flex justify-content-md-left">
                <a href="/pengguna_baru">
                    <button type="button" class="btn btn-info ">
                        <i class="fas fa-fw fa-plus"></i>
                    </button></a>
            </div> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="container-fluid">
                        <table class="table table-bordered  border-default table-hover" id="tableuser">
                            <thead class="table-default heig">
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Telpon/HP</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            @foreach ($data_user as $us)
                                <tr class="text-center">
                                    <td>{{ $us->id }}</td>
                                    <td>{{ $us->name }}</td>
                                    <td>{{ $us->NIK}}</td>
                                    <td>{{ $us->jenis_kelamin}}</td>
                                    <td>{{ $us->HP}}</td>
                                    <td>{{ $us->email }}</a></td>
                                    <td>{{ $us->role }}</td>
                                    <td>
                                        <div class="btn-group float-center shadow" role="group"
                                            aria-label="Basic mixed styles example">
                                            <a href="/users/{{ $us->id }}/edit" class="btn btn-warning btn-sm">
                                                <i class="fas fa-fw fa-solid fa-pen"></i>
                                            </a>

                                            <a href="/users/{{ $us->id }}/delete" class="btn btn-danger btn-sm"
                                                onclick="return confirm('yakin,dihapus??')">
                                                <i class="fas fa-fw fa-regular fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

                    </div>
                </div>
            </div>
        </div>
    @endsection



    @section('footer')
        <script>
            $(document).ready(function() {
                var table = $('#tableuser').DataTable({
                    dom: 'C<"clear">Bfrtip',
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],


                });
                //console.log(table.rows( {search:'applied'} ).count('datatables_filter'));
            });
        </script>
    @endsection
