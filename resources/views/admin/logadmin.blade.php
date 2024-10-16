@extends('layouts/main')
@section('content')
    <br>
    <div class="row md-12">
        <!-- Area Chart -->
        <div class="justify-content-center">
            <div class="col-xl-10 col-lg-8">
                <div class="card shadow mb-8">
                    <!-- Card Header-Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-info">Log Activity</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="block-content">
                            <table class="table table-borderless table-striped table-vcenter font-size-sm">
                                <tbody>
                                    @foreach ($activity_log as $log)
                                        <tr>
                                            <td class="font-w600 text-center" style="width: 100px;">
                                                <span class="badge badge-success">{{ $log->user->name }}</span>
                                            </td>
                                            <td class="d-none d-sm-table-cell">
                                                <span class="badge badge-success">{{ $log->description }}</span>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge badge-danger">{{ Carbon\Carbon::parse($log->created_at)->diffforHumans() }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endsection
