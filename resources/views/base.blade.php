<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style>
        nav a {
            color: #212121
        }

        nav li a {
            color: #212121
        }

        a {
            color: #212121
        }

    </style>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('title')</title>
</head>

<body>

    @auth
        <nav class="grey lighten-5">
            <div class="nav-wrapper">
                <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div>
        </nav>

        <ul class="sidenav" id="mobile">
            <li><a href="{{ route('logout') }}">Logout</a></li>
        </ul>
    @endauth

    <div class="container">
        <div class="row"></div>
        <div class="row">
            @yield('content')
        </div>

        <p id="sucesso" style="display: none;">{{ session()->get('sucesso') }}</p>
        <p id="erro" style="display: none;">{{ session()->get('erro') }}</p>
        <p id="aviso" style="display: none;">{{ session()->get('aviso') }}</p>

    </div>


    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var sidenavs = M.Sidenav.init(elems);

            var elems = document.querySelectorAll('.tooltipped');
            var tooltippeds = M.Tooltip.init(elems);

            var elems = document.querySelectorAll('select');
            var selects = M.FormSelect.init(elems);

            var elems = document.querySelectorAll('.modal');
            var modals = M.Modal.init(elems, {
                dismissible: false,
                onCloseEnd: () => {
                    document.getElementById('projeto_form').reset()
                }
            });

            var elems = document.querySelectorAll('.datepicker');
            var dates = M.Datepicker.init(elems, {
                format: 'dd/mm/yyyy',
                i18n: {
                    cancel: 'Cancelar',
                    weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
                    monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago',
                        'Set', 'Out', 'Nov', 'Dez'
                    ],
                    months: ['Janeiro', 'Fevereiro', 'Mar??o', 'Abril', 'Maio', 'Junho',
                        'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
                    ]
                }
            });

            let sucesso = document.querySelector('#sucesso').innerText
            let erro = document.querySelector('#erro').innerText
            let aviso = document.querySelector('#aviso').innerText

            if (sucesso.length)
                M.toast({
                    html: sucesso,
                    classes: 'green darken-4'
                })

            if (erro.length)
                M.toast({
                    html: erro,
                    classes: 'red darken-4'
                })

            if (aviso.length)
                M.toast({
                    html: aviso,
                    classes: 'light-blue'
                })

        });

    </script>

    @stack('js')
</body>

</html>
