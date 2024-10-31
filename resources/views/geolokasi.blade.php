@extends('layouts.app')

@section('content')
<style>
  #map {
    aspect-ratio: 1/1;
    width: 100%;
    border-radius: 10px;
    z-index: 0;
  }
</style>

<body>
  <section class="py-xl-5 mobile">
    <div class="container mt-5">
      <div class="row">
        <div class="col-lg-8">
          <div class="alert alert-danger" style="border-radius: 10px;">
            <h4>Jangan Lupa Mengaktifkan Lokasi/GPS ya!!</h4>
          </div>
          <div class="border shadow-lg mb-5" id="map"></div>
        </div>
        <div class="col-lg-4">
          <form method="post" action="{{ url('post') }}">
            @csrf @method('POST')
            <label><b>Nama *</b></label>
            <input type="text" name="name" class="form-control mt-1" required readonly value="{{ Auth::user()->name }}">
            <label class="mt-4 d-none "><b>Latitude *</b></label>
            <input type="text" name="latitude" class="d-none form-control mt-1" required id="latitude">
            <label class="mt-4 d-none "><b>Longitude *</b></label>
            <input type="text" name="longitude" class="d-none form-control mt-1" required id="longitude">
            <label class="mt-4"><b>Email *</b></label>
            <input type="text" name="email" class="form-control mt-1" required readonly id="email" value="{{ Auth::user()->email }}">
            <label class="mt-4"><b>status *</b></label>
            <input type="text" name="status" class="form-control mt-1" required readonly id="email" value="{{ Auth::user()->status }}">
            <div class="mt-4"><label class="form-label" for="country"><strong>Prodi *</strong></label>
            <select class="form-select countries order-alpha limit-pop-1000000 presel-MX group-continents group-order-na" name="prodi" readonly required>
                <option value="{{ Auth::user()->prodi }}">{{ Auth::user()->prodi }}</option>
              </select></div>
            <div class="py-4">
              <label class="form-label" for="keperluan"><strong>Keperluan *</strong></label><select class="form-select countries order-alpha limit-pop-1000000 presel-MX group-continents group-order-na" name="keperluan" required>
                <option></option>
                <option value="PEMINJAMAN, PENGEMBALIAN, PERPANJANGAN MASA PINJAM BUKU">PEMINJAMAN, PENGEMBALIAN, PERPANJANGAN MASA PINJAM BUKU</option>
                <option value="PERPANJANGAN MASA AKTIF KEANGGOTAAN">PERPANJANGAN MASA AKTIF KEANGGOTAAN</option>
                <option value="PENYERAHAN LAPORAN KERJA PRAKTEK/ PROYEK AKHIR">PENYERAHAN LAPORAN KERJA PRAKTEK/ PROYEK AKHIR</option>
                <option value="PENYERAHAN PROPOSAL KERJA PRAKTEK/ PROYEK AKHIR">PENYERAHAN PROPOSAL KERJA PRAKTEK/ PROYEK AKHIR</option>
                <option value="MEMBACA / MENGERJAKAN TUGAS">MEMBACA / MENGERJAKAN TUGAS</option>
                <option value="ADMINISTRASI LAINNYA">ADMINISTRASI LAINNYA</option>
              </select>
            </div>
            <button onclick="getCoordinates()" class="btn btn-primary mt-4 mb-5 w-100" style="border-radius: 5px;" type="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script>
    var coordinat1 = [<?php echo $koordinat1 ?>];
    var coordinat2 = [<?php echo $koordinat2 ?>];
    var coordinat3 = [<?php echo $koordinat3 ?>];
    var coordinat4 = [<?php echo $koordinat4 ?>];
  const map = L.map("map").setView(
    [-8.295612015301058, 114.30679719671924],
    20
  );
  L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
      '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
  }).addTo(map);

  const coordinates = [
  coordinat1,
  coordinat2,
  coordinat3,
  coordinat4
];

  const polygon = L.polygon(coordinates, {
    color: "blue",
    fillOpacity: 0.5,
  }).addTo(map);

  function isPointInsidePolygon(point, polygon) {
    const x = point[0];
    const y = point[1];

    let inside = false;
    for (let i = 0, j = polygon.length - 1; i < polygon.length; j = i++) {
      const xi = polygon[i][0];
      const yi = polygon[i][1];
      const xj = polygon[j][0];
      const yj = polygon[j][1];

      const intersect =
        yi > y !== yj > y && x < ((xj - xi) * (y - yi)) / (yj - yi) + xi;
      if (intersect) {
        inside = !inside;
      }
    }

    return inside;
  }
  function getCoordinates() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const lat = position.coords.latitude;
          const lng = position.coords.longitude;
          const point = [lat, lng];
          if (isPointInsidePolygon(point, coordinates)) {
            document.getElementById("latitude").value = lat.toFixed(6);
            document.getElementById("longitude").value = lng.toFixed(6);
            document.getElementById("result").innerText =
              "Anda berada di dalam polygon.";
          } else {
            document.getElementById("result").innerText =
              "Anda berada di luar polygon.";
          }
        },
        (error) => console.error("Gagal mendapatkan lokasi:", error)
      );
    } else {
      alert("Geolokasi tidak didukung pada perangkat Anda.");
    }
  }
  function getCoordinates() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const lat = position.coords.latitude;
          const lng = position.coords.longitude;
          const point = [lat, lng];
          if (isPointInsidePolygon(point, coordinates)) {
            document.getElementById("latitude").value = lat.toFixed(6);
            document.getElementById("longitude").value = lng.toFixed(6);
          } else {
            alert("Anda berada di luar perpustakaan");
          }
        },
        (error) => console.error("Gagal mendapatkan lokasi:", error)
      );
    } else {
      alert("Geolokasi tidak didukung pada perangkat Anda.");
    }
  }
  map.fitBounds(polygon.getBounds());
  function getUserLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showUserPosition, showError);
    } else {
      alert("Geolocation is not supported by this browser.");
    }
  }

  const customIcon = L.icon({
    iconUrl: 'https://res.cloudinary.com/dwe1tyctm/image/upload/v1697357909/6888606-removebg-preview_w7vyfv.png',  // URL gambar ikon
    iconSize: [32, 32],  // Ukuran ikon [lebar, tinggi]
    iconAnchor: [16, 32],  // Posisi titik 'anchor' dari ikon (pusat bawah)
    popupAnchor: [0, -32]  // Posisi titik 'popup' dari ikon (atas tengah)
  });

  function showUserPosition(position) {
    const userLatitude = position.coords.latitude;
    const userLongitude = position.coords.longitude;

    const userLocation = [userLatitude, userLongitude];

    const userMarker = L.marker(userLocation).addTo(map);
    userMarker.bindPopup("Lokasi Kamu").openPopup();

    const targetLocation = coordinat1;
    const targetMarker = L.marker(targetLocation,{ icon: customIcon }).addTo(map);
    targetMarker.bindPopup("Perpustakaan Poliwangi").openPopup();

    const polyline = L.polyline([userLocation, targetLocation], {
      color: "blue",
    }).addTo(map);
    map.fitBounds(polyline.getBounds());
  }
  function showError(error) {
    switch (error.code) {
      case error.PERMISSION_DENIED:
        alert("User denied the request for Geolocation.");
        break;
      case error.POSITION_UNAVAILABLE:
        alert("Location information is unavailable.");
        break;
      case error.TIMEOUT:
        alert("The request to get user location timed out.");
        break;
      case error.UNKNOWN_ERROR:
        alert("An unknown error occurred.");
        break;
    }
  }
  getUserLocation();
  </script>
  @endsection
