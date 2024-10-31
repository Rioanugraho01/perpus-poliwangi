<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Perpustakaan Poliwangi</title>
    <link rel="icon" type="image/png" href="https://poliwangi.ac.id/en/seleksipegawaikontrak2021/logo-poliwangi-4/"/>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css' )}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-md fixed-top navbar-shrink border-0" id="mainNav">
        <div class="container d-flex justify-content-center">
            <a class="navbar-brand d-flex justify-content-center align-items-center" href="https://ta.poliwangi.ac.id/~ti21003/"><img src="https://v2.poliwangi.ac.id/wp-content/uploads/2020/09/logo-poliwangi.png" width="70px" alt=""><span class="px-4">Perpustakaan <br> Poliwangi</span></a>
        </div>
    </nav>

    <nav class="navbar fixed-bottom bottom-bars shadow-lg mobile">
    <ion-icon id="home" name="home-outline" class="icons {{ (Request::is('home') ? 'actives' : '') }}" onclick="change(this); return halamanutama();">
      </ion-icon>
      <ion-icon id="cart" name="reader-outline" class="icons {{ (Request::is('checkout') ? 'actives' : '') }}" onclick="change(this); return cart();">
      </ion-icon>
      <ion-icon id="history" name="list-circle-outline" class="icons {{ (Request::is('historykunjungan') ? 'actives' : '') }}" onclick="change(this); return historykunjungan();">
      </ion-icon>
      <ion-icon id="profile" name="person-outline" class="icons {{ (Request::is('profile') ? 'actives' : '') }}" onclick="change(this); return profile();">
      </ion-icon></div>
    </nav>
        <main class="py-5">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/startup-modern.js') }}"></script>
    <script src="{{ asset('owl/js/highlight.js') }}"></script>
    <script src="{{ asset('owl/js/app.js') }}"></script>
    <script>
    function change(item){
        const buttons = document.querySelectorAll('ion-icon');
        buttons.forEach(function(obj){
            obj.classList.remove("actives");
        });
        item.classList.add("actives");
    }
    $("#home").on('click', function() {
    window.location = "{{ url('home')}}";
    });
    $("#cart").on('click', function() {
    window.location.href = "{{ url('presensi')}}";
    });
    $("#history").on('click', function() {
    window.location = "{{ url('history')}}";
    });
    $("#profile").on('click', function() {
    window.location = "{{ url('profile')}}";
    });
</script>
</body>
</html>
