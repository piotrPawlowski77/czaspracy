<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Czas pracy - backend</title>

    <meta name="description" content="Strona firmy Super Drob">
    <meta name="keywords" content="czas pracy">
    <meta name="author" content="Piotr Pawłowski">
    <meta http-equiv="X-Ua-Compatible" content="IE=edge">

    <link rel="stylesheet" href=" {{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/backend_index.css') }}" type="text/css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/fontello.css') }}" type="text/css" />

    <!--	czcionki do footer-a-->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/Footer-with-button-logo.css') }}">

    <!--Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet" />

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"> </script>

</head>
<body>

<!--naglowek-->
@include('layouts.navbar_admin')

<!--glowny content-->
@yield('content')

<!--stopka-->
@include('layouts.footer')

<!--skrypty-->
<script type="text/javascript" src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!--    atrybut integrity pozwoli nie ładować do przeglądarki kodu, który został w jakiś sposób zmanipulowany. a crossorigin jest obecny gdy korzystamy z mechanizmu: CROS (Cross-Origin Resource Sharing) pozwala użyć dod. nagłówki http na stronach  które przestrzegaja zassady same origin. Jeśli tych atrybutow nie bd to nic sie nie stanie.-->

</body>
</html>
