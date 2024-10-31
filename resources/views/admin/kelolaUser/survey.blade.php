@extends('layouts.admin')

@section('content')
<div class="container-fluid py-5">
    <div class="card shadow rounded-5">
        <div class="card-header border py-3" style="border-top-left-radius: 30px; border-top-right-radius: 30px;">
            <div class="row align-items-center p-2">
                <div class="col-md-6 py-2">
                    <h4 class="text-primary fw-bold">Pertanyaan</h4>

                </div>
            </div>
        </div>
        <div class="card-body">
            <div id="dataTable" class="table-responsive table mt-2" role="grid" aria-describedby="dataTable_info">
                <div class="main-card card mb-3">
                    <div class="card-body border-white border-warning" >
                        <h4 class="text-primary fw-bold">Tambah Pertanyaan</h4>

                            <div class="container">
                                <form action="{{ url('tambah-pertanyaan') }}" method="POST">
                                    @csrf
                                    @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    @if (Session::has('success'))
                                    <div class="alert alert-success text-center">
                                        <p>{{ Session::get('success') }}</p>
                                    </div>
                                    @endif
                                    <table class="table table-bordered" id="dynamicAddRemove">
                                        <tr>
                                            <th class="w-100">Pertanyaan</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="addMoreInputFields[][pertanyaan]" placeholder="Enter subject" class="form-control" required />
                                            </td>
                                            <td><button type="button" name="add" id="dynamic-ar" class="btn btn-primary">Tambah</button></td>
                                        </tr>
                                    </table>
                                    <button type="submit" class="btn btn-success btn-block" style="color:white">Save</button>
                                </form>
                            </div>
                    </div>
                </div>
                <div>
                    <div>
                        <div class="main-card card mb-3">
                            <div class="card-body border-white border-warning">
                                <h4 class="text-primary fw-bold">Hapus Pertanyaan</h4>
                                <table style="width: 100%;" id="example"
                                            class="table table-hover table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th class="w-100">Pertanyaan</th>
                                            <th >Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pertanyaan as $soal)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $soal->pertanyaan }}</td>
                                                <td>
                                                    <form action="{{ route('hapus.pertanyaan', ['id' => $soal->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger confirm-button">Hapus</button>
                                                    </form>
                                                    {{-- @csrf
                                                    @method('DELETE')
                                                    <a class="btn btn-danger btn-sm tombol-hapus" role="button" href="{{ route('hapus.pertanyaan',$pertanyaan->id)}}">Hapus</a>
                                                </td> --}}

                                                {{-- <td style="width: 60px;"><form action="{{ route('user.destroy',$user->id) }}" method="post">
                                                    <a href="{{ route('user.edit',$user->id) }}">
                                                    <i class="fas fa-edit fa-2x text-primary" style="font-size: 20px; font-color: red"></i></a>
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent"><i class="fas fa-trash fa-2x text-danger" style="font-size: 20px;"></i></button></form>
                                                    </td> --}}
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">

    $('.confirm-button').click(function(event) {
        var form =  $(this).closest("form");
        event.preventDefault();
        swal({
            title: `Apakah anda yakin?`,
            text: "Data akan dihapus permanen",
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

<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
            '][pertanyaan]" placeholder="Enter subject" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
// </script>
@endsection
