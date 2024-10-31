@extends('layouts.admin')

@section('content')
<div class="container-fluid py-5">
    <div class="card rounded-5 border shadow">
        <div class="card-header border py-3" style="border-top-left-radius: 30px; border-top-right-radius: 30px;">
            <div class="row align-items-center p-2">
                <div class="col-md-6 text-nowrap">
                    <div id="dataTable_length" class="dataTables_length" aria-controls="data-table">
                        <h4 class="text-primary fw-bold">Hasil Survei Kepuasan</h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-md-end">
                        <label class="form-label pr-2">
                            <div class="input-group">
                                <input id="dateInput" class="form-control form-control-sm" type="date" aria-controls="data-table" placeholder="Search" style="height: 38px;"/>
                            </div>
                        </label>
                        <label class="form-label">
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="search" aria-controls="data-table" placeholder="Search" id="searchInput">
                                <span class="input-group-append">
                                    <button class="btn bg-primary" type="button" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;border-top-left-radius: 0px;border-bottom-left-radius: 0px;">
                                        <i class="fa fa-search text-white"></i>
                                    </button>
                                </span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div id="data-table-1" class="table-responsive table mt-2" role="grid" aria-describedby="dataTable_info">
                <table id="data-table" class="table my-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Point Survei</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($totalPoint as $result)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $result->user->name }}</td>
                            <td>{{ $result->total_points }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <button class="border bg-primary rounded d-inline scroll-to-top" id="exportButton"><i class="fas fa-download"></i></button>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="{{ asset('assets/js/table.js') }}"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

@endsection
{{-- @extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- Content Row -->
    <div class="container-fluid py-5">
        <div class="card shadow rounded-5">
            <div class="card-header border py-3" style="border-top-left-radius: 30px; border-top-right-radius: 30px;">
                <div class="row align-items-center p-2">
                    <div class="col-md-6 py-2">
                        <h4 class="text-primary fw-bold">Hasil Survei Kepuasan</h4>
                    </div>
                </div>
            </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-result" cellspacing="0" width="100%" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Point Survei</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($totalPoint as $result)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $result->user->name }}</td>
                                <td>{{ $result->total_points }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- Content Row -->
</div>
</div>
</div>

@endsection --}}
