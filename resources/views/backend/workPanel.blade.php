@extends('layouts.backend')

@section('content')

    <div class="container">

        <header>
            <h1>Edytuj Zmianę</h1>
        </header>

        <p>Jesteś zalogowany jako: <mark>{{ $userAuth->name }} {{ $userAuth->surname }}</mark> </p>

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

{{--            <div class="row">--}}
{{--                <div class="alert alert-info alert-dismissible fade show col-sm-6 offset-sm-3 text-center" role="alert">--}}

{{--                    <p>{{ \Illuminate\Support\Facades\Session::get('message') }}</p>--}}

{{--                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}

{{--                </div>--}}
{{--            </div>--}}
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

        @foreach($users as $user)

            <div class="card bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header">Zmiany użytkownika {{$user->name}} {{$user->surname}}</div>

                @foreach($user->works as $work)

                    <div class="card-body">
                        <h5 class="card-title">{{ $work->work_day_in }} {{ $work->work_day_out }} {{ $work->work_day_in }} {{ $work->work_time_in }} {{ $work->work_time_out }}</h5>
                        <a href="{{ route('workPanel', ['id'=>$work->id]) }}" class="btn btn-info">Edytuj</a> <a href="{{ route('deleteWork', ['id'=>$work->id]) }}" class="btn btn-danger">Usuń</a>

                    </div>

                @endforeach

            </div>

        @endforeach

        <!-- Table -->
        <div class="table-responsive" >
            <table class="table table-fit mt-5 table-dark table-striped" >
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>myFirstName</td>
                    <td>myLastName</td>
                    <td>@myHandle</td>
                    <td >
                        <div class="d-flex flex-row  mb-3">
                            <div ><button type="button" class="btn">
                                    <i class="material-icons text-warning">edit</i>
                                </button></div>
                            <div ><button type="button" class="btn">
                                    <i class="material-icons text-danger">delete</i>
                                </button></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>anotherFirstName</td>
                    <td>anotherLastName</td>
                    <td>@anotherHandle</td>
                    <td >
                        <div class="d-flex flex-row mb-3">
                            <div ><button type="button" class="btn">
                                    <i class="material-icons text-warning">edit</i>
                                </button></div>
                            <div ><button type="button" class="btn">
                                    <i class="material-icons text-danger">delete</i>
                                </button></div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>

{{--        <div class="col-sm-12">--}}

{{--            @foreach($cities as $city)--}}

{{--                <div class="card bg-light mb-3" style="max-width: 18rem;">--}}
{{--                    <div class="card-header">Miasto {{$city->name}}</div>--}}

{{--                    @foreach($city->cars as $car)--}}

{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title">{{ $car->brand }} {{ $car->model }}</h5>--}}
{{--                            <a href="{{ route('carPanel', ['id'=>$car->id]) }}" class="btn btn-info">Edytuj</a> <a href="{{ route('deleteCar', ['id'=>$car->id]) }}" class="btn btn-danger">Usuń</a>--}}

{{--                        </div>--}}

{{--                    @endforeach--}}

{{--                </div>--}}

{{--            @endforeach--}}

{{--        </div>--}}

    </div>

@endsection
