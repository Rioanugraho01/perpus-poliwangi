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
                </div>
            </div>

                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                        <i class="header-icon fa fa-bars"> </i> Kuesioner
                    </div>
                    <form method="POST" action="{{ route ('tambah.kuisioner')}}" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <!-- start soal -->
                        {{-- @foreach($kuisioner as $soal) --}}
                            <?php $i = 1; foreach ($kuisioner as $soal) { ?>
                                    <label for="soal"><?= $i ?>. <?= $soal['pertanyaan']; ?></label>
                                    <div class="position-relative form-group ml-3">
                                        <div class="form-row ml-3">
                                            <div class="custom-radio custom-control col-md-3">
                                                <input type="radio" id="exampleCustomRadio1<?=$i?>" name="opsi[<?=$i?>]" value="4" class="custom-control-input" required>
                                                <label class="custom-control-label" for="exampleCustomRadio1<?=$i?>">Sangat Baik</label>
                                            </div>
                                            <div class="custom-radio custom-control col-md-3">
                                                <input type="radio" id="exampleCustomRadio2<?=$i?>" name="opsi[<?=$i?>]" value="3" class="custom-control-input" required>
                                                <label class="custom-control-label" for="exampleCustomRadio2<?=$i?>">Baik</label>
                                            </div>
                                            <div class="custom-radio custom-control col-md-3">
                                                <input type="radio" id="exampleCustomRadio3<?=$i?>" name="opsi[<?=$i?>]" value="2" class="custom-control-input" required>
                                                <label class="custom-control-label" for="exampleCustomRadio3<?=$i?>">Cukup</label>
                                            </div>
                                            <div class="custom-radio custom-control col-md-3">
                                                <input type="radio" id="exampleCustomRadio4<?=$i?>" name="opsi[<?=$i?>]" value="1" class="custom-control-input" required>
                                                <label class="custom-control-label" for="exampleCustomRadio4<?=$i?>">Kurang</label>
                                            </div>
                                        </div>
                                    </div>
                                <?php $i++;} ?>

                                    {{-- @endforeach --}}
                        <!-- end soal -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary float-right mb-3 mt-3 aksi" name="signup" value="Sign up">Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('assets/js/table.js') }}"></script>
@endsection
