<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    @yield('headContent')


    @yield('beforeScripts')

    <style>
        body {
            background-color: #cbca89;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="css/font-color.css">
    @yield('styles')
</head>

<body id="body">
    <div class="container-fluid mb-auto border-bottom">
        <div class="col"><h2 class="m-0 font-weight-bolder">Projet - Taxi</h2></div>
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link border-left font-weight-bold" href="{{url('/')}}">Accueil</a></li>
        </ul>
    </div>
    <h1>@yield('title')</h1>
    @yield('bodyContent')
    <scripts>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        @yield('afterScripts')

        <script>
            (() => {
                let index = 0;
                let possibilities = ["font-green", "font-turquoise",
                    "font-yellow", "font-orange", "font-orangered",
                    "font-pink", "font-gold", "font-silver"];
                let element = document.getElementById("body");
                element.classList.add(possibilities[0]);

                let callback = () => {
                    element.classList.remove(possibilities[index]);
                    index = (index === possibilities.length - 1) ? 0 : index + 1;
                    element.classList.add(possibilities[index]);
                    setTimeout(callback, 10000);
                };
                setTimeout(callback, 10000);
            })();
        </script>
    </scripts>
</body>
</html>
