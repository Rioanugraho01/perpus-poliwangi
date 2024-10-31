@extends('layouts.admin')
@section('content')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.css" />
<style>
    #map {
        width: 100%;
        height: 550px;
    }

    #reset-button {
        margin-top: 10px;
    }

    .coordinates-input {
        margin-top: 10px;
        width: 100%;
    }
</style>

<body>
    <div class="container-fluid pt-5 bg-white">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
        </div>
        <div class="row d-flex align-items-start flex-wrap">
            <div class="col-lg-7 col-xl-8 mb-4">
                <div class="d-flex flex-column align-items-start shadow border" style="padding:12px; gap:16px; flex: 1 0 0; border-radius: 16px; background-color: #F7F9FB; gap: 16px;">
                    <div class="d-flex align-items-center align-content-center align-self-stretch flex-wrap" style="border-radius: 8px; gap: 16px;">
                        <div class="rounded-3" id="map"></div>
                        <button id="reset-button" class="btn btn-primary w-100"><i class="fa fa-refresh"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-xl-4 mb-4">
                <div class="d-flex flex-column align-items-start shadow border" style="padding: 24px; gap: 16px; flex: 1 0 0; border-radius: 16px; background-color:#F7F9FB;">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="text-primary fw-bold ml-auto">Titik Koordinat</h6>
                    </div>
                    @foreach($coordinat as $coordinat)
                    <div class="row mb-3">
                        <div class="mb-3">
                            <input id="myInput" value="{{ $coordinat->koordinat1 }}" class="form-control" type="text" placeholder="Koordinat 1" name="koordinat1" />
                        </div>
                        <div class="mb-3">
                            <input readonly value="{{ $coordinat->koordinat2 }}" class="form-control" type="text" placeholder="Koordinat 2" name="koordinat2" />
                        </div>
                        <div class="mb-3">
                            <input readonly value="{{ $coordinat->koordinat3 }}" class="form-control" type="text" placeholder="Koordinat 3" name="koordinat3" />
                        </div>
                        <div class="mb-3">
                            <input readonly value="{{ $coordinat->koordinat4 }}" class="form-control" type="text" placeholder="Koordinat 4" name="koordinat 4" />
                        </div>
                        <div class="mb-3">
                            <form method="post" action="{{ route('geolocation',$coordinat->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger w-100"><i class="fa fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                    <hr>
                    <form method="post" action="{{ url('geolocation/post') }}">
                    @csrf
                    <div class="row mb-3" id="myButton">
                        <div class="mb-3">
                            <input readonly class="form-control coordinates-input" type="text" id="coordinates-input1" placeholder="Koordinat 1" name="koordinat1" />
                        </div>
                        <div class="mb-3">
                            <input readonly class="form-control coordinates-input" type="text" id="coordinates-input2" placeholder="Koordinat 2" name="koordinat2" />
                        </div>
                        <div class="mb-3">
                            <input readonly class="form-control coordinates-input" type="text" id="coordinates-input3" placeholder="Koordinat 3" name="koordinat3" />
                        </div>
                        <div class="mb-3">
                            <input readonly class="form-control coordinates-input" type="text" id="coordinates-input4" placeholder="Koordinat 4" name="koordinat4" />
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-success text-white w-100">Save</i></button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.js"></script>
    <script>
        var coordinat1 = [<?php echo $koordinat1 ?>];
        var coordinat2 = [<?php echo $koordinat2 ?>];
        var coordinat3 = [<?php echo $koordinat3 ?>];
        var coordinat4 = [<?php echo $koordinat4 ?>];
        var map = L.map('map').setView([0, 0], 18);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
        var customPolygon = L.polygon([
            coordinat1,
            coordinat2,
            coordinat3,
            coordinat4
        ]).addTo(map);
        var coordinatesArray = [];
        function onMapClick(e) {
            if (coordinatesArray.length < 4) {
                customPolygon.addLatLng(e.latlng);
                coordinatesArray.push(e.latlng);
                var coordinatesInputs = document.querySelectorAll('.coordinates-input');
                for (var i = 0; i < coordinatesArray.length; i++) {
                    coordinatesInputs[i].value = coordinatesArray[i].lat + ', ' + coordinatesArray[i].lng;
                }
            }
        }

        map.on('click', onMapClick);

        document.getElementById('reset-button').addEventListener('click', function() {
            map.removeLayer(customPolygon);
            customPolygon = L.polygon([]).addTo(map);
            coordinatesArray = [];
            var coordinatesInputs = document.querySelectorAll('.coordinates-input');
            for (var i = 0; i < 4; i++) {
                coordinatesInputs[i].value = '';
            }
        });
        function getCurrentLocation() {
            if ('geolocation' in navigator) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    if (coordinatesArray.length < 4) {
                        var currentLocation = L.latLng(position.coords.latitude, position.coords.longitude);
                        var marker = L.marker(currentLocation).addTo(map);
                        marker.bindPopup('Lokasi saat ini').openPopup();
                    }
                });
            } else {
                alert('Geolocation is not supported by this browser.');
            }
        }
        var customTargetLocation = null;
        var customTargetMarker;

        // Function to handle map clicks and update the custom target location
        function handleMapClick(e) {
            customTargetLocation = e.latlng;

            // Remove the previous custom target marker, if it exists
            if (customTargetMarker) {
                map.removeLayer(customTargetMarker);
            }

            // Create a new marker for the custom target location
            customTargetMarker = L.marker(customTargetLocation).addTo(map);
            customTargetMarker.bindPopup('Custom Target Location').openPopup();
        }

        map.on('click', function(e) {
            handleMapClick(e);

            // You can also store the custom target location in an input field or variable
            // For example, if you want to display it in an input field:
            document.getElementById('custom-target-input').value = customTargetLocation.lat + ', ' + customTargetLocation.lng;
        });
        getCurrentLocation();
        L.Control.geocoder().addTo(map);
    </script>

<script>
    var myButton = document.getElementById("myButton");
    var myInput = document.getElementById("myInput");
    function toggleButton() {
      var inputValue = myInput.value;
      if (inputValue === null || inputValue === "") {
        myButton.style.display = "block";
      } else {
        myButton.style.display = "none";
      }
    }
    myInput.addEventListener("input", toggleButton);
    toggleButton();
  </script>

    @endsection

