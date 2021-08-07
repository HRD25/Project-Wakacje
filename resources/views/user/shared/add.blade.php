@extends('layouts.app')

@section('content')
    <div class="container text-center col-sm-8 mt-3">
        <div class="card mt-1 text-center bg-dark">
            <h3 class="card-header" style="color: white"><i>Formularz Zgłoszeniowy</i></h3>
            <div class="card-body bg-light">
                <form action="{{ route('add') }} " method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text m-0 p-0">Państwo</span>
                        </div>
                        <input type="text" id="panstwo"
                            class="form-control col-md-6 @error('panstwo') is-invalid @else is-valid @enderror"
                            aria-label="text" name="panstwo" placeholder="nazwa" value="{{ old('panstwo') }}">

                        @error('panstwo')
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 17 16">
                                    <path
                                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </symbol>
                            </svg>
                            <div class="alert alert-danger d-flex align-items-center m-0 ml-3 p-1" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                    <use xlink:href="#exclamation-triangle-fill" />
                                </svg>
                                <div>
                                    <p class="text m-0">{{ $message }}</p>
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text m-0 p-1">Miasto</span>
                        </div>
                        <input type="text" id="miasto"
                            class="form-control col-md-6 @error('miasto') is-invalid @else is-valid @enderror"
                            aria-label="text" name="miasto" placeholder="nazwa" value="{{ old('miasto') }}">

                        @error('miasto')
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 17 16">
                                    <path
                                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </symbol>
                            </svg>
                            <div class="alert alert-danger d-flex align-items-center m-0 ml-3 p-1" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                    <use xlink:href="#exclamation-triangle-fill" />
                                </svg>
                                <div>
                                    <p class="text m-0">{{ $message }}</p>
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text p-0" for="osoby">Ilość osób</label>
                        </div>
                        <select class="custom-select col-sm-5" id="osoby" name="osoby">
                            <option selected value="{{ old('osoby') }}">Wybierz</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text p-0" for="inputGroupSelect01">Dodatki</label>
                        </div>

                        <select class="custom-select col-sm-5 " id="dodatki" name="dodatki">
                            <option selected>Wybierz</option>
                            @foreach ($dodatki as $key => $item)
                                <option value="{{ $item->id }}">{{ $item->nazwa }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text p-0">PLN</span>
                        </div>
                        <input type="number" id="cena"
                            class="form-control col-md-4 @error('cena') is-invalid @else is-valid @enderror"
                            aria-label="Kwota" name="cena" placeholder="cena" value="{{ old('cena') }}">
                        <div class="input-group-append">
                            <span class="input-group-text p-0 m-0">Za 1 osobę</span>
                        </div>

                        @error('cena')
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 17 16">
                                    <path
                                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </symbol>
                            </svg>
                            <div class="alert alert-danger d-flex align-items-center m-0 ml-3 p-1" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                    <use xlink:href="#exclamation-triangle-fill" />
                                </svg>
                                <div>
                                    <p class="text m-0">{{ $message }}</p>
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text p-0" for="kal-1">Od</label>
                        </div>
                        <input type="date" id="kal-1" name="od" class="col-sm-2" value="{{ old('od') }}">

                        <div class="input-group-prepend">
                            <label class="input-group-text ml-2 p-0" for="kal-2">Do</label>
                        </div>
                        <input type="date" id="kal-2" name="do" class="col-sm-2" value="{{ old('do') }}">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text p-1">Zdjecia</span>
                        </div>
                        <input class="form-control form-control-sm col-sm-2" id="file" type="file" name="zdjecie"
                            value="{{ old('zdjecie') }}">
                        <input class="form-control form-control-sm col-sm-2" id="file" type="file" name="zdjecie">
                        <input class="form-control form-control-sm col-sm-2" id="file" type="file" name="zdjecie">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Opis</span>
                        </div>
                        <textarea class="form-control col-6 @error('opis') is-invalid @else is-valid @enderror"
                            aria-label="Opis" name="opis" placeholder="Piekna okolica ...">{{ old('opis') }}</textarea>

                        @error('opis')
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 17 16">
                                    <path
                                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </symbol>
                            </svg>
                            <div class="alert alert-danger d-flex align-items-center m-0 ml-3 p-1" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                    <use xlink:href="#exclamation-triangle-fill" />
                                </svg>
                                <div>
                                    <p class="text m-0">{{ $message }}</p>
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="dostepny">
                            <label class="form-check-label" for="przykladowyCheckbox">
                                Dostepny
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark col-md-4">Wyślij</button>
                </form>
            </div>
        </div>
    </div>
@endsection
