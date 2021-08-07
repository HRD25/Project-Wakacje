@extends('layouts.app')

@section('content')
    <div class="container container-fluid">
        <div class="row-fluid">
            <div class="mt-3">
                <div class="card bg-dark">
                    <h2 class="card-header text-center" style="color: white"> <i>Wakacje najlepsze pod Słońcem</i></h2>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="col-md-">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="img-fluid d-block" style="height: 450px;width:100%"
                                        src="https://tygrysypodrozy.pl/wp-content/uploads/2019/11/20191010_132018.jpg"
                                        alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="img-fluid d-block" style="height: 450px;width:100%"
                                        src="https://zielonamapa.pl/wp-content/uploads/2020/05/moher.jpg"
                                        alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="img-fluid d-block" style="height: 450px;width:100%"
                                        src="https://ocdn.eu/pulscms-transforms/1/Yo7k9kpTURBXy84ODFlZjRhMjA5NmY5NDNmYzJiMDhiMTVhNmNmOThhYS5wbmeTlQMAAM0HgM0EOJMJpjc4ODYyYgaTBc0EsM0CdoGhMAE/najpiekniejsze-klify-w-europie.jpg"
                                        alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only"></span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
