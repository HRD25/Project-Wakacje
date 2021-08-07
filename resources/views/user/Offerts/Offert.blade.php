@extends('layouts.app')

@section('content')
    <div class="container container-fluid mt-3">
        <div class="card">
            <div class="row">
                @foreach ($offerta as $item)
                    <div class="col-md">
                        <div class="card card-body">
                            {{-- <img class="card-img-top img-fluid" src="{{ asset('storage/' . $item->zdjecie) }}" alt="foto"> --}}
                            {{-- <img class="card-img-top img-fluid" src="{{ $item->zdjecie }}" alt="foto"> --}}
                            <div id="carouselExampleIndicators{{ $item->id }}" class="carousel slide"
                                data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="{{ $item->zdjecie }}" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{ $item->zdjecie }}" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{ $item->zdjecie }}" alt="Third slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators{{ $item->id }}"
                                    role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators{{ $item->id }}"
                                    role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                </a>
                            </div>
                            <h2 class="card-title text-center mt-2">{{ $item->panstwo . ' | ' . $item->miasto }}</h2>
                            <h4 class="text-right">Cena {{ $item->cena }} zł za 1 osobe</h4>

                            <h5 class="card-text text-left m-0">
                                Dostepne dla: <b>{{ $item->osoby }}</b> Osób
                                </5>

                                <p class="card-text text-right mb-2">Dodano {{ $item->created_at }}</p>
                                <div>
                                    <a href="{{ route('get.offerts') }}"><button type="button"
                                            class="btn btn-outline-dark mr-1 btn-md col-md-4">Wróć</button></a>

                                    <a href="$"><button type="button"
                                            class="btn btn-outline-secondary btn-md mr-1 col-md-3">Napisz</button></a>

                                    <a href="#"><button type="button"
                                            class="btn btn-outline-info btn-md mr-1 col-md-4">Zadzwoń</button></a>
                                </div>
                                <div class="text-right">
                                    @can('delete', $item)
                                        <form method="POST" action="{{ route('deleteOffert', ['id' => $item->id]) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button class="text-danger bg-light border border-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                    <path fill-rule="evenodd"
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <h5 class="card=text"></h5>
                <i>
                    <h5 class="card-text">{{ $item->opis }}</h5>
                </i>
                <p class="card-text lead">Od Hotelu:
                <ul>
                    <i>
                        <li class="lead">{{ $item->additive->nazwa }}</li>
                    </i>
                </ul>
                </p>
            </div>
        </div>
    </div>
    @endforeach
@endsection
