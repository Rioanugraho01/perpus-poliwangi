@extends('layouts.app')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@section('content')
<section class="py-4 py-md-5 my-5">
    <div class="container py-4 py-xl-5">
        <div class="card shadow">
            <div class="card-header bg-gray py-3">
                <div class="row align-items-center">
                <div class="col-md-6">
                <h5 class="text-primary m-0 fw-bold">Riwayat Kunjungan</h5>
                </div>
                <div class="col-md-6">
                    <div class="text-md-end">
                        <label class="form-label pr-2 py-2">
                            <div class="input-group">
                                <input id="dateInput" class="form-control form-control-sm" type="date" aria-controls="data-table" placeholder="Search" style="height: 35px;"/>
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
                <div id="dataTable-1" class="table-responsive table mt-2" role="grid" aria-describedby="dataTable_info">
                    <table id="data-table" class="table my-0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                {{-- <th>Nama</th>
                                <th>Email</th>
                                <th>Prodi</th>
                                <th>Status</th> --}}
                                <th>Keperluan</th>
                                <th>Tanggal</th>
                                <th>Kuisioner</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($history->get() as $pengguna)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                {{-- <td>{{ $pengguna->name }}</td>
                                <td>{{ $pengguna->email }}</td>
                                <td>{{ $pengguna->prodi }}</td>
                                <td>{{ $pengguna->status }}</td> --}}
                                <td>{{ $pengguna->keperluan }}</td>
                                <td>{{ $pengguna->time }}</td>
                                <td class="align-middle">
                                    <a class="btn btn-info btn-sm" role="button" href="{{ route('surveikepuasan', ['id' => $pengguna->id]) }}" id="kuesionerBtn_{{ $pengguna->id }}" onclick="return confirmAndHideButton({{ $pengguna->id }})">Isi Kuesioner</a>
                                </td>
                                {{-- <td class="align-middle">
                                    <a class="btn btn-info btn-sm" role="button" href="{{ route('surveikepuasan', ['id' => $pengguna->id]) }}" id="kuesionerBtn_{{ $pengguna->id }}" onclick="return confirm('Apakah Anda yakin ingin mengisi kuisioner?') && hideButton({{ $pengguna->id }})">Isi Kuesioner</a>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('assets/js/table.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script>
    function confirmAndHideButton(id) {
        if (confirm('Apakah Anda yakin ingin mengisi kuisioner?')) {
            hideButton(id);
            return true;
        } else {
            return false;
        }
    }

    function hideButton(id) {
        // Simpan informasi bahwa tombol sudah diklik ke dalam localStorage
        localStorage.setItem('buttonClicked_' + id, true);

        // Sembunyikan tombol
        document.getElementById('kuesionerBtn_' + id).style.display = 'none';

        return false; // Jangan melakukan navigasi standar (href)
    }

    // Cek apakah tombol sudah diklik sebelumnya dan sembunyikan jika iya
    document.addEventListener('DOMContentLoaded', function() {
        @foreach($history->get() as $pengguna)
            var buttonClicked = localStorage.getItem('buttonClicked_{{ $pengguna->id }}');
            if (buttonClicked) {
                document.getElementById('kuesionerBtn_{{ $pengguna->id }}').style.display = 'none';
            }
        @endforeach
    });
</script>
{{-- <script>
    // Function to hide the button and store the information in localStorage
    function hideButton(id) {
        // Hide the button
        document.getElementById(`kuesionerBtn_${id}`).style.display = 'none';

        // Store information in localStorage
        localStorage.setItem(`kuesionerBtn_${id}_clicked`, true);
    }

    // Check localStorage and hide buttons that have been clicked before
    document.addEventListener('DOMContentLoaded', function () {
        @foreach($history->get() as $pengguna)
            var storedValue = localStorage.getItem(`kuesionerBtn_{{ $pengguna->id }}_clicked`);
            if (storedValue === 'true') {
                document.getElementById(`kuesionerBtn_{{ $pengguna->id }}`).style.display = 'none';
            }
        @endforeach
    });
</script> --}}
<script type="text/javascript">

    $('.confirm-button').click(function(event) {
        var form =  $(this).closest("form");
        event.preventDefault();
        swal({
            title: `Apakah anda yakin?`,
            text: "Survei kepuasan hanya dapat dilakukan sekali",
            icon: "info",
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
