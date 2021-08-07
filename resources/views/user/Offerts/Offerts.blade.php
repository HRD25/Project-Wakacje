@extends('layouts.app')

@section('content')
    <div class="container mt-2 container-fluid shadow p-2 mb-5 bg-body rounded">
        <div class="card bg-dark">
            <div class="card-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="text-right">
                        <ul class="nav nav-pills">
                            <input class="col-sm-2 ml-3 rounded" type="text" name="panstwo" id="panstwo"
                                placeholder="Panstwo">
                            <input class="col-sm-2 ml-3 mr-3 rounded" type="text" name="miasto" id="miasto"
                                placeholder="Miasto">

                            <div class="btn-group mr-1">
                                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Termin
                                </button>
                                <div class="dropdown-menu text-center p-0 m-0">
                                    <div class="row m-0 p-0">
                                        <input type="date" name="od">
                                        <input type="date" name="do">
                                    </div>
                                </div>
                            </div>

                            <div class="btn-group mr-1">
                                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dodatki
                                </button>
                                <div class="dropdown-menu text-center p-0">
                                    @foreach ($additives as $item)
                                        <div class="dropdown-divider m-0"></div>
                                        <a class="dropdown-item" href="#">{{ $item->nazwa }}</a>
                                    @endforeach
                                </div>
                            </div>

                            <div class="btn-group mr-1">
                                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Osoby
                                </button>
                                <div class="dropdown-menu text-center m-0 p-0">
                                    <div class="row m-0 p-0">
                                        <input type="text" name="osoby" placeholder="Ilość">
                                    </div>
                                </div>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Cena
                                </button>

                                <div class="dropdown-menu text-center m-0 p-0">
                                    <div class="row m-0 p-0">
                                        <input type="number" name="cena-od" placeholder="Cena od ... zł">
                                        <div class="dropdown-divider m-0 p-0"></div>
                                        <input type="number" name="cena-od" placeholder="Cena do ... zł">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3 ml-3">
                                <button type="button" class="btn btn-outline-light btn-sm col-sm">Szukaj</button>
                            </div>
                        </ul>
                    </div>
                </form>
            </div>
        </div>

        @if ($offerts->count() > 0)
            <div class="card bg-secondary">
                <div class="row justify">
                    @foreach ($offerts as $item)
                        <div class="col-4 mt-2">
                            <div class="card card-body bg-light">
                                {{-- <img class="card-img-top img-fluid" src="{{ asset('storage/' . $item->zdjecie) }}" alt="foto"> --}}
                                <img class="card-img-top img-fluid rounded" src="{{ $item->zdjecie }}" alt="foto">
                                <h4 class="card-title h6 mt-2"><b>{{ $item->panstwo . ' | ' . $item->miasto }}</b></h4>
                                <h6 class="text-right">Cena: <b>{{ $item->cena }} zł</b> za 1 osobe</h6>
                                <p class="m-0 text-left"><b>Dostępne:</b></p>
                                <ul class="card-text mb-0">
                                    <li>
                                        {{ $item->additive->nazwa }}
                                    </li>
                                </ul>
                                <p class="card-text mb-0 mt-3">Pobyt:
                                    Od: <b>{{ $item->od }}</b>
                                    Do: <b>{{ $item->do }}</b><br>
                                </p>
                                <p class="card-text text-center mt-2">
                                    Dostepne dla: <b>{{ $item->osoby }}</b> Osób
                                </p>
                                <p class="card-text text-right">Dodano {{ $item->created_at }}</p>
                                <div class="text-center">
                                    <a href="{{ route('get.offert', ['id' => $item->id]) }}">
                                        <button type="button"
                                            class="btn btn-outline-success btn-sm col-sm-4">Sprawdz</button>
                                    </a>
                                    <a href="#">
                                        <button type="button"
                                            class="btn btn-outline-secondary btn-sm col-sm-3">Napisz</button>
                                    </a>
                                    <a href="#">
                                        <button type="button"
                                            class="btn btn-outline-primary btn-sm col-sm-4">Zadzwoń</button>
                                    </a>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @else
                    <div class="card">
                        <h5 class="card-header text-center">Brak ofert do wyświetlenia!</h5>
                    </div>
        @endif
    </div>
    </div>
    </div>
@endsection

@section('r-content')
    @if (session()->has('message'))
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
        </svg>
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <p class="ml-3 m-0">{{ session()->get('message') }}</p>
        </div>
    @endif
@endsection
