@extends('layouts.admin')

@section('content')
<div class="container-fluid py-5">
    <div class="card shadow rounded-5">
        <div class="card-header border py-3" style="border-top-left-radius: 30px; border-top-right-radius: 30px;">
            <div class="row align-items-center p-2">
                <div class="col-md-6 py-2">
                    <a href="{{ route('user.create') }}" class="btn btn-primary" type="button" style="font-size: 12px; heigh:40px;">
                    <i class="fas fa-plus fa-2x text-white-300" style="font-size: 20px;"></i></a>
                    <span class="text-primary fw-bold"> Tambah Akun</span>
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
            <div id="dataTable" class="table-responsive table mt-2" role="grid" aria-describedby="dataTable_info">
                <table id="data-table" class="table my-0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Prodi</th>
                            <th>Status</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img class="rounded-circle me-2" width="30" height="30" src="{{ $user->image ?? asset('assets/img/user-profile-icon-front-side_kljtj0.jpg') }}" /></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->prodi }}</td>
                            <td>{{ $user->status }}</td>
                            <td>{{ $user->alamat }}</td>
                            <td style="width: 60px;"><form action="{{ route('user.destroy',$user->id) }}" method="post">
                                <a href="{{ route('user.edit',$user->id) }}">
                                <i class="fas fa-edit fa-2x text-primary" style="font-size: 20px; font-color: red"></i></a>
                                @csrf @method('DELETE')
                                <button type="submit" class="border-0 bg-transparent confirm-button"><i class="fas fa-trash fa-2x text-danger" style="font-size: 20px;"></i></button></form>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="{{ asset('assets/js/table.js') }}"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">

    $('.confirm-button').click(function(event) {
        var form =  $(this).closest("form");
        event.preventDefault();
        swal({
            title: `Apakah anda yakin?`,
            text: "Data akan dihapus secara permanen",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });

</script>


@endsection
