@extends('layouts.admin')

@section('content')
<div class="container-fluid"><a class="btn btn-link link-primary mb-3" role="button" href="{{ url('management') }}"><i class="fas fa-arrow-left"></i> Back</a>
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Buat User</h3>
    </div>
    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="card shadow mb-3">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold">Isi Semua Tabel *</p>
            </div>
            <div class="card-body">
                <div class="container-fluid d-flex align-items-center justify-content-center flex-column py-4 mb-4 border rounded">
                    <img id="output" src="{{ $user->image ?? asset('assets/img/user-profile-icon-front-side_kljtj0.jpg') }}" class="rounded-circle mb-3 mt-4 img-fluid border object-fit-none" width="110px" height="110px" style="display: inline;height: 110px; width: 110px"/>
                   <div id="photoBtn" class="btn btn-secondary btn-sm d-flex justify-content-center" type="button">
                    <label class="form-label text-white m-1 d-flex justify-content-center" for="customFile1">Upload Foto</label> 
                    <input name="image" type="file" class="form-control d-none" id="customFile1" accept="image/*" onchange="loadFile(event)"/> 
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-8">
                        <div class="mb-3"><label class="form-label" for="name"><strong>Nama Lengkap *</strong></label><input id="name" class="form-control" type="text" placeholder="{{ $user->name }}" name="name" value="{{ $user->name }}" required /></div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="mb-3"><label class="form-label" for="NIM/NIPPK/No.Telp"><strong>Email *</strong><br /></label><input id="NIM/NIPPK/No.Telp" class="form-control" type="text" placeholder="{{ $user->email }}" value="{{ $user->email }}" name="email" required /></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-5">
                    <div class="mb-3"><label class="form-label" for="country"><strong>Prodi *</strong></label><select class="form-select countries order-alpha limit-pop-1000000 presel-MX group-continents group-order-na" name="prodi" required>
                            <option value="{{ $user->prodi }}">{{ $user->prodi }}</option>
                            <option value="Agribisnis">Agribisnis</option>
                            <option value="Manajemen Bisnis dan Pariwisata">Manajemen Bisnis dan Pariwisata</option>
                            <option value="Teknik Manufaktur Kapal">Teknik Manufaktur Kapal</option>
                            <option value="Teknologi Pengolahan Hasil Ternak">Teknologi Pengolahan Hasil Ternak</option>
                            <option value="Teknologi Rekayasa Komputer">Teknologi Rekayasa Komputer</option>
                            <option value="Teknologi Rekayasa Perangkat Lunak">Teknologi Rekayasa Perangkat Lunak</option>
                            <option value="Bisnis Digital">Bisnis Digital</option>
                            <option value="Teknologi Rekayasa Manufaktur">Teknologi Rekayasa Manufaktur</option>
                            <option value="Teknologi Rekayasa Konstruksi Jalan & Jembatan">Teknologi Rekayasa Konstruksi Jalan & Jembatan</option>
                        </select></div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="mb-3"><label class="form-label" for="address"><strong>Alamat *</strong><br /></label><input id="alamat" class="form-control" type="text" placeholder="{{ $user->alamat }}" name="alamat" required /></div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="mb-3"><label class="form-label" for="status"><strong>status</strong></label><select class="form-select countries order-alpha limit-pop-1000000 presel-MX group-continents group-order-na" name="status" required>
                        <option value="{{ $user->status }}">{{ $user->status }}</option>
                        <option value="Dosen">Dosen</option>
                        <option value="Umum">Umum</option>
                        <option value="Mahasiswa">Mahasiswa</option>
                    </select></div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-12">
                        <div class="mb-3"><label class="form-label" for="address"><strong>Password * <i class="bi bi-eye-slash" id="togglePassword"></i></strong><br /></label><input id="password" class="form-control" type="password" placeholder="Masukkan Password" name="password" required /> </div>
                    </div>
                    <div class="">
                        <button class="btn btn-primary btn-lg w-100" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>
@endsection

