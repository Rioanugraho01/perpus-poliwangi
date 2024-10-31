@extends('layouts.app')

@section('content')
<header class="pt-5">
    <div class="container pt-4 pt-xl-5">
        <div class="row pt-5">
            <div class="col-md-8 text-center text-md-start mx-auto">
                <div class="text-center">
                    <h3 class="display-4 fw-bold mb-5"><br><span style="color: rgb(33, 37, 41);">Penikmat Koleksi </span><br><span style="color: rgb(33, 37, 41);">&nbsp;</span>&nbsp;<span class="underline">Tahun Ini</span>.</h3>
                    <p class="fs-5 text-muted mb-5"><br><span style="color: rgb(33, 37, 41);">Pengunjung terbaik kami, ada di sini. Nama dan foto Anda juga bisa muncul di sini. Rajin-rajinlah berkunjung dan membaca</span><br><br></p>
                    <form class="d-flex justify-content-center flex-wrap" method="post">
                        <div class="shadow-lg mb-3"></div>
                        <div class="shadow-lg mb-3"></div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-lg-10 mx-auto">
                <div class="text-center position-relative"></div>
            </div>
        </div>
    </div>
</header>
<section>
    <div class="container">
        <div class="row gx-1 gx-lg-2 row-cols-3 row-cols-xl-3 justify-content-center">
            @foreach($topUsers as $pengunjung)
            <div class="col">
                <div class="card shadow-lg rounded">
                    <img class="border-0" src="{{ $pengunjung->users->image ?? asset('assets/img/user-profile-icon-front-side_kljtj0.jpg')  }}" alt="Responsive Image" /></p>
                    <div class="card-body">
                        <div class="text-center">
                            <h6>{{ $pengunjung->users->name }}</h6>
                            <p>{{ $pengunjung->users->status }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="mobile">
<div class="container py-4 py-xl-5">
        <div class="row">
            <div class="col-md-6">
                <i class="fa fa-user" ></i><span> {{ Auth::user()->status ?? 'User' }}</span>
                <h3 class="display-6 fw-bold pb-md-4">Hallo&nbsp;<span class="underline" style="color: var(--bs-indigo);">{{ Auth::user()->name }}</span></h3>
                <p class="text-muted py-4 py-md-0">Selamat Datang di Area Anggota, tempat Anda dapat melihat status keanggotaan dan peminjaman.&nbsp;</p>
            </div>
        </div>
    </div>
</section>
<div class="container">
<section class="mobile" id="demos">
      <div class="row1">
        <div class="large-12 columns">
          <div class="owl-carousel owl-theme">
            <div class="item shadow-lg border">
              <img src="https://img.freepik.com/free-vector/online-document-concept-illustration_114360-5563.jpg?w=1380&t=st=1694061288~exp=1694061888~hmac=351982ab563ec3798d3b7dcf363e3273859e8ae7faf942086a5d966b6877b705" alt="">
            </div>
            <div class="item shadow-lg border">
              <img src="https://img.freepik.com/free-vector/customer-survey-concept-illustration_114360-2594.jpg?w=1380&t=st=1694061522~exp=1694062122~hmac=9d1e4345b4200f101609f5fa9dc231e4465fd79fcc1a55810f7a99a80d77eb57" alt="">
            </div>
            <div class="item shadow-lg border">
              <img src="https://img.freepik.com/free-vector/man-holding-clock-time-management-concept_23-2148823171.jpg?w=1380&t=st=1694061636~exp=1694062236~hmac=74cc51ced6b8526cb56237e4b48dba04c871a1aed269fe8e64c21102196481be" alt="">
            </div>
            <div class="item shadow-lg border">
              <img src="https://img.freepik.com/free-vector/video-upload-concept-illustration_114360-4702.jpg?w=1380&t=st=1694061673~exp=1694062273~hmac=c822da820b3aa722c512684a31cb01bc2693ba2f291389548718288b9e3daab2" alt="">
            </div>
          </div>
          <script>
            $(document).ready(function() {
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                items: 2,
                loop: true,
                margin: 10,
              });
            })
          </script>
        </div>
      </div>
    </section>
<section class="desktop">
    <div class="container py-4 py-xl-5">
        <div class="row">
            <div class="col-md-6">
                <h3 class="display-6 fw-bold pb-md-4">History&nbsp;<span class="underline" style="color: var(--bs-indigo);">Kunjungan</span></h3>
                <p class="text-muted py-4 py-md-0">History Kunjungan adalah kunjungan yang dilakukan ke perpustakaan untuk tujuan pendidikan, penelitian, atau minat pribadi dalam akses sumber daya literatur dan informasi yang tersedia di dalamnya.&nbsp;</p><a class="btn btn-warning me-2 mt-2" role="button" href="{{ url('history') }}" style="background: var(--bs-indigo);color: var(--bs-white);display: inline-block;border-style: none;">Lihat Selengkapnya</a>
            </div>
            <div class="col"><img class="rounded img-fluid w-100 fit-cover" style="min-height: 300px;" src="{{ asset('bootstrap/img/illustrations/teamwork.svg') }}" width="468" height="352"></div>
        </div>
        <div class="row gy-4 gy-md-0">
            <div class="col-md-6 d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                <div>
                    <div class="row gy-2 row-cols-1 row-cols-sm-2">
                        <div class="col text-center text-md-start">
                            <div class="d-flex justify-content-center align-items-center justify-content-md-start"></div>
                        </div>
                        <div class="col text-center text-md-start">
                            <div class="d-flex justify-content-center align-items-center justify-content-md-start"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="desktop">
    <div class="container py-4 py-xl-5">
        <div class="row gy-4 gy-md-0">
            <div class="col-md-6 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                <div><img class="rounded img-fluid fit-cover" style="min-height: 300px;" src="{{ asset('bootstrap/img/illustrations/presentation.svg') }}" width="800"></div>
            </div>
            <div class="col">
                <div style="max-width: 450px;">
                    <h3 class="fw-bold pb-md-4" style="font-size: 36.88px;">Survey&nbsp;<span class="underline">Kepuasan</span></h3>
                    <p class="text-muted py-4 py-md-0">Survey kepuasan perpustakaan adalah alat yang digunakan oleh perpustakaan untuk mengumpulkan umpan balik dari pengunjung guna menilai tingkat kepuasan terhadao layanan dan fasilitas perpustakaan</p>
                </div><a class="btn btn-warning me-2 mt-2" role="button" href="{{ url('surveikepuasan') }}" style="background: var(--bs-indigo);color: var(--bs-white);display: inline-block;border-style: none;">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>
</section>


  <!--</div><section class="desktop">
    <div class="container py-4 py-xl-5">
        <div class="bg-primary border rounded border-0 border-primary overflow-hidden"></div>
    </div>
    <div class="container py-4 py-xl-5">
        <div class="row">
            <div class="col-md-6">
                <h3 class="display-6 fw-bold pb-md-4">History&nbsp;<span class="underline" style="color: var(--bs-indigo);">Peminjaman</span></h3>
                <p class="text-muted py-4 py-md-0">Proses dimana individu atau anggota perpustakaan meminjam buku. materi cetak, sumber daya digital atau bahan lainya dari perpustakaan untuk digunakan dalam jangka waktu tertentu.</p><a class="btn btn-warning me-2 mt-2" role="button" href="#" style="background: var(--bs-indigo);color: var(--bs-white);display: inline-block;border-style: none;">Lihat Selengkapnya</a>
            </div>
            <div class="col"><img class="rounded img-fluid w-100 fit-cover" style="min-height: 300px;" src="../bootstrap/img/illustrations/teamwork.svg" width="468" height="352"></div>
        </div>
        <div class="row gy-4 gy-md-0">
            <div class="col-md-6 d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                <div>
                    <div class="row gy-2 row-cols-1 row-cols-sm-2">
                        <div class="col text-center text-md-start">
                            <div class="d-flex justify-content-center align-items-center justify-content-md-start"></div>
                        </div>
                        <div class="col text-center text-md-start">
                            <div class="d-flex justify-content-center align-items-center justify-content-md-start"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="desktop">
    <div class="container py-4 py-xl-5">
        <div class="row gy-4 gy-md-0">
            <div class="col-md-6 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                <div><img class="rounded img-fluid fit-cover" style="min-height: 300px;" src="../bootstrap/img/illustrations/presentation.svg" width="800"></div>
            </div>
            <div class="col">
                <div style="max-width: 450px;">
                    <h3 class="fw-bold pb-md-4" style="font-size: 36.88px;">Bebas&nbsp;<span class="underline">Tanggungan</span></h3>
                    <p class="text-muted py-4 py-md-0">Mengacu pada kondisi dimana seorang anggota perpustakaan telah mengembalikan semua bahan pustaka yang dipinjam dan tidak mengembalikan semua bahan pustaka yang dipinjam dan tidak memiliki utang atau denda tertinggal di perpustakaan.</p>
                </div><a class="btn btn-warning me-2 mt-2" role="button" href="#" style="background: var(--bs-indigo);color: var(--bs-white);display: inline-block;border-style: none;">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>-->
</section>
@endsection