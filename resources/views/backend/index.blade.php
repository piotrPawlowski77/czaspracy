@extends('layouts.backend')

@section('content')

    <main>

        <section class="search_interactive">

            <div class="container">

                <!-- Resetowanie hasla - informacja z sesjii o zresetowaniu hasla -->
                @if (session('status'))
                    <div class="row">
                        <div class="alert alert-success col-sm-12 text-center" role="alert">
                            <p>Hasło zostało zresetowane</p>
                        </div>
                    </div>
                @endif
                <!-- END Resetowanie hasla - informacja o zresetowaniu hasla -->

                <!-- Informacja z sesjii o braku aut do rezerwacji -->
                @if(session('message'))
                    <div class="row">
                        <div class="alert alert-danger col-sm-12 text-center" role="alert">
                            <p>{{ session('message') }}</p>
                        </div>
                    </div>
                @endif


                <header>
                    <h1>Witaj na stronie - backend</h1>
                    <p>Ustaw grafik</p>
                </header>

                @guest
                    <div>
                        <a href="{{ route('login') }}" class="btn btn-success btn-lg">Logowanie</a>
                    </div>
                @else
                    {{--  tu dziala logout... w navbar nie chce dzialac z dropdownu (token w get sie pojawia)--}}
                    <div class="mt-3 space-y-1">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link class="btn btn-danger btn-lg" :href="route('logout')"
                                                   onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Wyloguj się') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                @endguest

            </div>

        </section>

    </main>

@endsection
