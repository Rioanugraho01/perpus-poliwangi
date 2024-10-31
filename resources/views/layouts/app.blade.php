<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="msapplication-tap-highlight" content="no" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Perpustakaan Poliwangi</title>

    <!-- Web Application Manifest -->
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <!-- Chrome for Android theme color -->
    <meta name="theme-color" content="#ffffff">

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="PWA">
    <link rel="icon" sizes="512x512" href="/images/icons/512x512.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
    <meta name="apple-mobile-web-app-title" content="PWA">
    <link rel="apple-touch-icon" href="/images/icons/144x144.png">

    <link href="/images/icons/splash-640x1136.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-750x1334.png" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-1242x2208.png" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-1125x2436.png" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-828x1792.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-1242x2688.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-1536x2048.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-1668x2224.png" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-1668x2388.png" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-2048x2732.png" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />

    <!-- Tile for Win8 -->
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/images/icons/144x144.png">

    <link rel="icon" type="image/png" href="https://poliwangi.ac.id/en/seleksipegawaikontrak2021/logo-poliwangi-4/"/>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owl/css/docs.theme.min.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <link rel="stylesheet" href="{{ asset('owl/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owl/css/owl.theme.default.min.css') }}">
    <script src="{{ asset('owl/js/jquery.min.js') }}"></script>
    <script src="{{ asset('owl/js/owl.carousel.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @laravelPWA
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md fixed-top navbar-shrink py-3" id="mainNav">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="https://ta.poliwangi.ac.id/~ti21003/"><span class="desktop" style="text-align: center;">Perpustakaan <br>Poliwangi</span><span class="mobile">Perpustakaan Poliwangi</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
            <span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item desktop"><a class="nav-link {{ (Request::is('/') ? 'active' : '') }}" href="{{ url('/') }}" style="text-align: center;">Halaman<br>Utama</a></li>
                    <li class="nav-item desktop"><a class="nav-link {{ (Request::is('history') ? 'active' : '') }}" href="{{ url('history')}}" style="text-align: center;">History <br>Kunjungan</a></li>
                    {{-- <li class="nav-item desktop"><a class="nav-link {{ (Request::is('surveikepuasan') ? 'active' : '') }}" href="{{ url('surveikepuasan') }}" style="text-align: center;">Survei <br>Kepuasan</a></li> --}}

                    <li class="nav-item mobile"><a class="nav-link mb-1 {{ (Request::is('/') ? 'active' : '') }}" href="{{ url('/') }}">Halaman Utama</a></li>
                    <li class="nav-item mobile"><a class="nav-link mb-1 {{ (Request::is('historykunjungan') ? 'active' : '') }}" href="{{ url('historykunjungan')}}">History Kunjungan</a></li>
                    {{-- <li class="nav-item mobile"><a class="nav-link mb-1 {{ (Request::is('surveikepuasan') ? 'active' : '') }}" href="{{ url('surveikepuasan') }}">Survei Kepuasan</a></li> --}}
                </ul>
                <ul class="navbar-nav">
                    @guest
                    @if (Route::has('login'))
                    <a class="btn btn-primary shadow" role="button" href="{{ route('login') }}">Masuk</a>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-danger" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item bg-danger text-white" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ __('Keluar') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar fixed-bottom bottom-bars shadow-lg mobile">
        <ion-icon id="home" name="home-outline" class="icons {{ (Request::is('/') ? 'actives' : '') }}" onclick="change(this); return welcome();">
        </ion-icon>
        <ion-icon id="presensi" name="reader-outline" class="icons {{ (Request::is('presensi') ? 'actives' : '') }}" onclick="change(this); return presensi();">
        </ion-icon>
        <ion-icon id="history" name="list-circle-outline" class="icons {{ (Request::is('history') ? 'actives' : '') }}" onclick="change(this); return historykunjungan();">
        </ion-icon>
        <ion-icon id="profile" name="person-outline" class="icons {{ (Request::is('profile') ? 'actives' : '') }}" onclick="change(this); return profile();">
        </ion-icon></div>
    </nav>

    <main class="py-5">
        @yield('content')
    </main>

    </div>
    <footer class="desktop">
        <div class="container py-4 py-lg-5">
            <div class="row row-cols-2 row-cols-md-4">
                <div class="col-12 col-md-3">
                    <div class="fw-bold d-flex align-items-center mb-2"><span>Perpustakaan Poliwangi</span></div>
                    <p class="text-muted">Perpustakaan Poliwangi adalah sebuah lembaga penunjang pendidikan di Indonesia yang bertujuan untuk menyediakan sumber informasi, literatur, dan referensi yang diperlukan oleh mahasiswa, dosen, dan staf administrasi untuk menunjang kegiatan akademik dan penelitian. Perpustakaan ini didesain dan diorganisir dengan baik untuk memberikan akses mudah dan efisien terhadap berbagai koleksi ilmiah.</p>
                </div>
                <div class="col-sm-4 col-md-3 text-lg-start d-flex flex-column">
                    <h3 class="fs-6 fw-bold">Lokasi</h3>
                    <ul class="list-unstyled">
                        <li></li>
                        <li></li>
                    </ul>
                    <p class="text-muted"><span style="color: rgb(var(--brz-global-color5));">Jalan Raya Jember KM 13 Banyuwangi 68461, </span><br><span style="color: rgb(var(--brz-global-color5));">Jawa Timur – Indonesia</span></p>
                </div>
                <div class="col-sm-4 col-md-3 text-lg-start d-flex flex-column">
                    <h3 class="fs-6 fw-bold">Tentang Kami</h3>
                    <ul class="list-unstyled">
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <p class="text-muted">Selamat datang di Perpustakaan Poliwangi, pusat pengetahuan dan sumber informasi yang berdedikasi untuk mendukung pengembangan akademik dan penelitian di Politeknik Negeri Banyuwangi. Kami berkomitmen untuk menyediakan akses terhadap beragam koleksi ilmiah dan memfasilitasi proses pembelajaran bagi seluruh komunitas akademik kami.</p>
                </div>
                <div class="col-sm-4 col-md-3 text-lg-start d-flex flex-column">
                    <h3 class="fs-6 fw-bold">Kontak</h3>
                    <ul class="list-unstyled">
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <p class="text-muted"><strong><span style="color: rgb(var(--brz-global-color5));">No Telp</span></strong><br><span style="color: rgb(var(--brz-global-color5));">+62(0333)636780</span><br><strong><span style="color: rgb(var(--brz-global-color5));">Email:</span></strong><span style="color: rgb(var(--brz-global-color5));"> poliwangi@poliwangi.ac.id</span><br><span style="color: rgb(var(--brz-global-color5));">humas@poliwangi.ac.id</span><br><br></p>
                </div>
            </div>
            <hr>
            <div class="text-muted d-flex justify-content-between align-items-center pt-3">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-facebook">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
                        </svg></li>
                    <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-twitter">
                            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
                        </svg></li>
                    <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-instagram">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
                        </svg></li>
                </ul>
            </div>
        </div>
    </footer>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/startup-modern.js') }}"></script>
    <script src="{{ asset('owl/js/highlight.js') }}"></script>
    <script src="{{ asset('owl/js/app.js') }}"></script>
    <script>
        function change(item) {
            const buttons = document.querySelectorAll('ion-icon');
            buttons.forEach(function(obj) {
                obj.classList.remove("actives");
            });
            item.classList.add("actives");
        }
        $("#home").on('click', function() {
            window.location = "{{ url('/')}}";
        });
        $("#presensi").on('click', function() {
            window.location.href = "{{ url('presensi')}}";
        });
        $("#history").on('click', function() {
            window.location = "{{ url('history')}}";
        });
        $("#profile").on('click', function() {
            window.location = "{{ url('profile')}}";
        });
    </script>
    <script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/servicesworker.js')
        .then((registration) => {
            console.log('Service Worker terdaftar dengan sukses', registration);
        })
        .catch((error) => {
            console.log('Gagal mendaftarkan Service Worker', error);
        });
    }
    </script>
</body>

</html>
