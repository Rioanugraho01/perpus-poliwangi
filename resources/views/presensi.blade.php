@extends('layouts.app')

@section('content')
<section>
    <div class="container py-5 py-xl-5">
        <div class="row gx-3 gx-lg-2 row-cols-2 row-cols-xl-3">
            <div class="col">
                <div class="card shadow-lg rounded">
                    <img class="img-fluid" src="https://img.freepik.com/free-vector/barcode-concept-illustration_114360-7032.jpg?w=1380&t=st=1694085173~exp=1694085773~hmac=a96bb71eab1726f9c71a1d2bf46115fe34fe2275ff9977abdded06a6e596712c" alt="Responsive Image" />
                    <div class="card-body">
                        <div class="text-center">
                            <h6>Scan KTM</h6>
                        </div>
                    </div>
                    <div class="text-center">
                        <a class="stretched-link" style="border-radius: 5px;" href=""></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-lg rounded">
                    <img class="img-fluid" src="https://img.freepik.com/free-vector/local-tourism-concept-with-map_23-2148581110.jpg?w=1380&t=st=1694085048~exp=1694085648~hmac=424af7a5ba05488d05656c6cb1ce70014dc167e0760b46081c7117ee5d6fec2c" alt="Responsive Image"/>
                    <div class="card-body">
                        <div class="text-center">
                            <h6>Geolokasi</h6>
                        </div>
                    </div>
                    <div class="text-center">
                        <a class="stretched-link" style="border-radius: 5px;" href="{{ url('geolokasi') }}"></a>
                    </div>
                </div>
            </div>
            <div class="col mt-3">
                <div class="card shadow-lg rounded">
                    <img class="img-fluid" src="https://img.freepik.com/free-vector/affective-computing-abstract-concept-illustration_335657-2283.jpg?w=1380&t=st=1694085232~exp=1694085832~hmac=213c86b91610751c6a0736433aa72b84574732ac609bb3ab13e350bab330c57a" alt="Responsive Image"/>
                    <div class="card-body">
                        <div class="text-center">
                            <h6>Face Scan</h6>
                        </div>
                    </div>
                    <div class="text-center">
                        <a class="stretched-link" style="border-radius: 5px;" href=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection