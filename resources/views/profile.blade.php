@extends('layouts.app')

@section('content')
</style>
<section class="py-5 mobile">
<div class="container-fluid">
    <div class="card shadow mb-3">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Profile</p>
        </div>
        <div class="card-body">
            <form action="{{ route('profile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container-fluid d-flex align-items-center justify-content-center flex-column py-4 mb-4 border rounded">
                    <img id="output" src="{{ Auth::user()->image ?? asset('assets/img/user-profile-icon-front-side_kljtj0.jpg')}}" class="rounded-circle mb-3 mt-4 img-fluid border object-fit-none" width="110px" height="110px" style="display: inline;height: 110px; width: 110px"/>
                   <div id="photoBtn" class="btn btn-primary btn-sm d-flex justify-content-center" type="button">
                    <label class="form-label text-white m-1 d-flex justify-content-center" for="customFile1">Ganti</label> 
                    <input name="image" type="file" class="form-control d-none" id="customFile1" accept="image/*" onchange="loadFile(event)"/> 
                   </div>
                </div>
                    <div class="col-sm-8 col-md-8 col-lg-9 col-xl-10 col-xxl-10 align-self-center">
                        <div class="row">
                            <div class="col-md-12 text-start">
                                <div class="mb-3"><label class="form-label" for="email"><strong>Email</strong></label><input value="{{ Auth::user()->email }}" disabled id="email" class="form-control" type="email" placeholder="{{ Auth::user()->email }}" name="email" required /></div>
                            </div>
                            <div class="col-md-12 text-start">
                                <div class="mb-3"><label class="form-label" for="username"><strong>Nama</strong></label><input class="form-control" type="text" placeholder="{{ Auth::user()->name }}" name="name" value="{{ Auth::user()->name }}" /></div>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-6">
                        <div class="mb-3"><label class="form-label" for="address"><strong>Status</strong></label><input class="form-control" type="text" placeholder="{{ Auth::user()->status }}" value="{{ Auth::user()->status }}" name="status" readonly /></div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3"><label class="form-label" for="address"><strong>prodi</strong></label><input class="form-control" type="text" placeholder="{{ Auth::user()->prodi }}" value="{{ Auth::user()->prodi }}" name="prodi" readonly /></div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3"><label class="form-label" for="address"><strong>Alamat</strong></label><input class="form-control" type="text" placeholder="{{ Auth::user()->alamat }}" name="alamat" value="{{ Auth::user()->alamat }}" /></div>
                    </div>
                    <div class="col">
                        <p id="emailErrorMsg" class="text-danger" style="display: none;"></p>
                        <p id="passwordErrorMsg" class="text-danger" style="display: none;"></p>
                    </div>
                    <div class="col-md-12" style="text-align: right;margin-top: 5px;"><button id="submitBtn" class="btn btn-primary btn-sm" type="submit">Simpan</button></div>
                </div>
            </form>
        </div>
    </div>
</div>
</section>

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