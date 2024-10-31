@extends('layouts.admin')

@section('content')
<div class="container-fluid pt-5 bg-white">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Hallo, <b class="text-primary">{{ Auth::user()->name }}!</b></h3>
        <form method="post" action="{{ url('dashboard') }}">
            @csrf
        <label class="form-label px-2">
            <div class="input-group">
                <input name="date" class="form-control form-control-sm" type="date" value="{{ $inputTanggal }}" aria-controls="data-table" placeholder="Search" style="height: 40px;" />
                <button class="btn btn-primary" type="submit"><i class="fa fa-refresh text-white"></i></button>
            </div>
        </label>
        </form>
    </div>
    <div class="row d-flex align-items-start flex-wrap">
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="d-flex flex-column align-items-start" style="min-width: 200px; padding: 24px; gap: 8px; flex: 1 0 0; border-radius: 16px; background-color: #E3F5FF">
                <div class="d-flex align-items-center align-content-center align-self-stretch flex-wrap" style="gap: 8px; border-radius: 8px;">
                    <span class="align-self-strecth" style="flex: 1 0 0; color: #1C1C1C; font-feature-settings:'cv11' on, 'cv01' on, 'ss01' on; font-family: Inter; font-size: 14px; font-style: normal; font-weight: 600; line-height: 20px;">
                        Total Pengunjung Hari Ini
                    </span>
                </div>
                <div class="d-flex justify-content-between align-items-center align-content-center align-self-stretch flex-wrap" style="row-gap: 8px;">
                    <div class="d-flex flex-column justify-content-center align-items-start" style="border-radius: 8px;">
                        <span class="align-self-stretch" style="color: #1C1C1C; font-feature-settings: 'cv11' on, 'cv01' on, 'ss01' on; font-family: Inter; font-size: 24px; font-style: normal; font-weight: 600; line-height: 36px;">
                            {{ $hari }}
                        </span>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-start" style="border-radius: 8px;">
                        <span class="align-self-stretch" style="color: #1C1C1C; font-feature-settings: 'cv11' on, 'cv01' on, 'ss01' on; font-family: Inter; font-size: 12px; font-style: normal; font-weight: 400; line-height: 36px;">
                            <span>
                                <img src="{{ asset('assets/img/icons8-standing-man-100.png') }}" width="60px" height="60px" alt="">
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="d-flex flex-column align-items-start" style="min-width: 200px; padding: 24px; gap: 8px; flex: 1 0 0; border-radius: 16px; background-color: #E5ECF6;">
                <div class="d-flex align-items-center align-content-center align-self-stretch flex-wrap" style="gap: 8px; border-radius: 8px;">
                    <span class="align-self-stretch" style="color:#1C1C1C; font-feature-settings: 'cv11' on, 'cv01' on, 'ss01' on; font-family: inter; font-size: 14px; font-style:normal; font-weight: 600; line-height: 20px;">
                        Total Pengunjung Bulan Ini
                    </span>
                </div>
                <div class="d-flex justify-content-between align-items-center align-content-center align-self-stretch flex-wrap" style="row-gap:  8px; border-radius: 8px;">
                    <div class="d-flex flex-column justify-content-center align-items-start" style="border-radius: 8px;">
                        <span class="align-self-stretch" style="color: #1C1C1C; font-feature-settings: 'cv11' on, 'cv01' on, 'ss01' on; font-family: Inter; font-size: 24px; font-style: normal; font-weight: 600; line-height: 36px;">
                            {{ $bulan }}
                        </span>
                    </div>
                    <div class="d-flex align-items-center align-content-center flex-wrap" style="gap: 4px; border-radius: 8px;">
                        <span class="align-self-stretch" style="color: #1C1C1C; font-feature-settings: 'cv11' on, 'cv01' on, 'ss01' on; font-family: Inter; font-size: 12px; font-style: normal; font-weight: 400; line-height: 36px;">
                            <img src="{{ asset('assets/img/icons8-calendar-100.png') }}" width="60px" height="60px" alt="">
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="d-flex flex-column align-items-start" style="min-width: 200px; padding: 24px; gap: 8px; flex: 1 0 0; border-radius: 16px; background-color: #E3F5FF">
                <div class="d-flex align-items-center align-content-center align-self-stretch flex-wrap" style="gap: 8px; border-radius: 8px;">
                    <span class="align-self-strecth" style="flex: 1 0 0; color: #1C1C1C; font-feature-settings:'cv11' on, 'cv01' on, 'ss01' on; font-family: Inter; font-size: 14px; font-style: normal; font-weight: 600; line-height: 20px;">
                        Total Pengunjung Tahun Ini
                    </span>
                </div>
                <div class="d-flex justify-content-between align-items-center align-content-center align-self-stretch flex-wrap" style="row-gap: 8px;">
                    <div class="d-flex flex-column justify-content-center align-items-start" style="border-radius: 8px;">
                        <span class="align-self-stretch" style="color: #1C1C1C; font-feature-settings: 'cv11' on, 'cv01' on, 'ss01' on; font-family: Inter; font-size: 24px; font-style: normal; font-weight: 600; line-height: 36px;">
                            {{ $tahun }}
                        </span>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-start" style="border-radius: 8px;">
                        <span class="align-self-stretch" style="color: #1C1C1C; font-feature-settings: 'cv11' on, 'cv01' on, 'ss01' on; font-family: Inter; font-size: 12px; font-style: normal; font-weight: 400; line-height: 36px;">
                            <span>
                                <img src="{{ asset('assets/img/icons8-book-100.png') }}" width="60px" height="60px" alt="">
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="d-flex flex-column align-items-start" style="min-width: 200px; padding: 24px; gap: 8px; flex: 1 0 0; border-radius: 16px; background-color: #E5ECF6;">
                <div class="d-flex align-items-center align-content-center align-self-stretch flex-wrap" style="gap: 8px; border-radius: 8px;">
                    <span class="align-self-stretch" style="color:#1C1C1C; font-feature-settings: 'cv11' on, 'cv01' on, 'ss01' on; font-family: inter; font-size: 14px; font-style:normal; font-weight: 600; line-height: 20px;">
                        Total Akun
                    </span>
                </div>
                <div class="d-flex justify-content-between align-items-center align-content-center align-self-stretch flex-wrap" style="row-gap:  8px; border-radius: 8px;">
                    <div class="d-flex flex-column justify-content-center align-items-start" style="border-radius: 8px;">
                        <span class="align-self-stretch" style="color: #1C1C1C; font-feature-settings: 'cv11' on, 'cv01' on, 'ss01' on; font-family: Inter; font-size: 24px; font-style: normal; font-weight: 600; line-height: 36px;">
                            {{ $pengguna }}
                        </span>
                    </div>
                    <div class="d-flex align-items-center align-content-center flex-wrap" style="gap: 4px; border-radius: 8px;">
                        <span class="align-self-stretch" style="color: #1C1C1C; font-feature-settings: 'cv11' on, 'cv01' on, 'ss01' on; font-family: Inter; font-size: 12px; font-style: normal; font-weight: 400; line-height: 36px;">
                            <span>
                                <img src="{{ asset('assets/img/icons8-users-100.png') }}" width="60px" height="60px" alt="">
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-xl-8 mb-4">
            <div class="d-flex flex-column align-items-start shadow border" style="padding:24px; gap:16px; flex: 1 0 0; border-radius: 16px; background-color: #F7F9FB; gap: 16px;">
                <div class="d-flex align-items-center align-content-center align-self-stretch flex-wrap" style="border-radius: 8px; gap: 16px;">
                    <div class="d-flex flex-column align-items-center" style="gap: 4px">
                        <h6 class="text-primary fw-bold m-0" style="color: var(--black-100, #1C1C1C);font-feature-settings: 'cv11' on, 'cv01' on, 'ss01' on;font-family: Inter;line-height: 20px;">
                            Pengunjung Tahun Ini
                            <hr>
                        </h6>
                    </div>
                </div>
                <div class="chart-area">
                    <canvas data-bss-chart="{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Jan&quot;,&quot;Feb&quot;,&quot;Mar&quot;,&quot;Apr&quot;,&quot;May&quot;,&quot;Jun&quot;,&quot;Jul&quot;,&quot;Aug&quot;,&quot;Sep&quot;,&quot;Okt&quot;,&quot;Nov&quot;,&quot;Des&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Pengunjung&quot;,&quot;fill&quot;:true,&quot;data&quot;:[&quot;0&quot;,&quot;{{ $jan }}&quot;,&quot;{{ $feb }}&quot;,&quot;{{ $mar }}&quot;,&quot;{{ $apr }}&quot;,&quot;{{ $jun }}&quot;,&quot;{{ $jul }}&quot;,&quot;{{ $ags }}&quot;,&quot;{{ $sep }}&quot;,&quot;{{ $oct }}&quot;,&quot;{{ $nov }}&quot;,&quot;{{ $des }}&quot;],&quot;backgroundColor&quot;:&quot;rgba(78, 115, 223, 0.05)&quot;,&quot;borderColor&quot;:&quot;rgba(78, 115, 223, 1)&quot;}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:false},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;]},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}]}}}"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-xl-4 mb-4">
            <div class="d-flex flex-column align-items-start shadow border" style="padding: 24px; gap: 16px; flex: 1 0 0; border-radius: 16px; background-color:#F7F9FB;">
                <div class="d-flex flex-column justify-content-center align-items-start align-self-stretch" style="border-radius:  8px;">
                    <h6 class="text-primary fw-bold m-0" style="color: var(--black-100, #1C1C1C);font-feature-settings: 'cv11' on, 'cv01' on, 'ss01' on;font-family: Inter;line-height: 20px;">
                        Pengunjung Terbanyak
                        <hr>
                    </h6>
                </div>
                <div class="align-self-stretch">
                    <div class="chart-area"><canvas data-bss-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Dosen&quot;,&quot;Mahasiswa&quot;,&quot;Umum&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;:[&quot;#4e73df&quot;,&quot;#1cc88a&quot;,&quot;#36b9cc&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;:[&quot;{{ $dos }}&quot;,&quot;{{ $mah }}&quot;,&quot;{{ $um }}&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}}}"></canvas></div>
                    <div class="text-center small mt-4"><span class="me-2"><i class="fas fa-circle text-primary"></i>&nbsp;Dosen</span><span class="me-2"><i class="fas fa-circle text-success"></i>&nbsp;Mahasiswa</span><span class="me-2"><i class="fas fa-circle text-info"></i>&nbsp;Umum</span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-xl-7 mb-4">
            <div class="d-flex flex-column align-items-start border shadow" style="padding: 24px; gap:16px; flex: 1 0 0; border-radius: 16px; background-color: #F7F9FB;">
                <div class="d-flex flex-column justify-content-center align-items-start align-self-stretch" style="border-radius:  8px;">
                    <h6 class="text-primary fw-bold m-0" style="color: var(--black-100, #1C1C1C);font-feature-settings: 'cv11' on, 'cv01' on, 'ss01' on;font-family: Inter;line-height: 20px;">
                        Pengunjung Prodi
                        <hr>
                    </h6>
                </div>
                <div class="align-self-stretch">
                    <div class="chart-area" style="width: auto; height: auto;"><canvas id="myChart"></canvas></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
    var xValues = ["AGB", "MBP", "TMK", "TPHT", "TRK", "TRPL", "BD", "TRM", "TRKJ"];
    var yValues = [<?php echo $agbb ?>, <?php echo $mbpp ?>, <?php echo $tmkk ?>, <?php echo $tphtt ?>, <?php echo $trkk ?>, <?php echo $trpll ?>, <?php echo $bdd ?>, <?php echo $trmm ?>, <?php echo $trkjj ?>];
    var barColors = ["#004225", "#DAC0A3", "#C70039", "#765827", "#FBECB2", "#FFCD4B", "#2E97A7", "#952323", "#6499E9"];

    new Chart("myChart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: false,
                text: "Pengunjung Terbaik"
            }
        }
    });
</script>
@endsection