@extends('layouts.frontend')

@section('content')

    <div class="container">

        <header>
            <h1>Aktualnie w pracy jest:</h1>
        </header>

        <p>Dzisiaj jest: {{ date('Y-m-d H:i:s') }}</p>
        <p>v1.0</p>

    </div>

@endsection
