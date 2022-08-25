@extends('layouts.backend')

@section('content')

    <div class="container">

        <header>
            <h1>Edytuj Zmianę</h1>
        </header>

{{--        <p>Jesteś zalogowany jako: <mark>{{ $userAuth->name }} {{ $userAuth->surname }}</mark> </p>--}}

        <!-- Informacja z sesjii o komunikatach -->
        @if(\Illuminate\Support\Facades\Session::has('message'))

            <div style="background: none; border: none" class="alert alert-primary d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                </svg>

                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                        {{ \Illuminate\Support\Facades\Session::get('message') }}
                    </div>
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger col-sm-6 offset-sm-3">
                <ul class="ul_errors">
                    @foreach ($errors->all() as $error)
                        <li class="czerwone">{{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <a href="{{ route('adminHome') }}">Powrót</a>

        <div class="row">

            <div class="col-sm-12">

                <form class="form-inline formSchedule" method="POST" action="{{ route('workPanel', ['id'=>$work->id]) }}" enctype="multipart/form-data">

                    <label class="my-1 mr-2" for="enterUser">Wybierz użytkownika *</label>
                    <select class="custom-select my-1 mr-sm-2" id="enterUser" name="enterUser">

                            <option value="{{ $work->user_id }}">{{ $work->user->name }} {{ $work->user->surname }}</option>

                    </select>

                    <div class="row mb-3">
                        <label for="work_day_in" class="col-sm-2 col-form-label">Data od *</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control-sm" id="work_day_in" name="work_day_in" value="{{ $work->work_day_in ?? old('work_day_in') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="work_day_out" class="col-sm-2 col-form-label">Data do *</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control-sm" id="work_day_out" name="work_day_out" value="{{ $work->work_day_out ?? old('work_day_out') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="work_time_in" class="col-sm-2 col-form-label">Czas od *</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control-sm" id="work_time_in" name="work_time_in" value="{{ $work->work_time_in ?? old('work_time_in') }}">

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="work_time_out" class="col-sm-2 col-form-label">Czas do *</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control-sm" id="work_time_out" name="work_time_out" value="{{ $work->work_time_out ?? old('work_time_out') }}">
                        </div>
                    </div>


                    <button type="submit" class="btn btn-success">Zapisz</button>

                    {{ csrf_field() }}
                </form>

            </div>

        </div>

@endsection
