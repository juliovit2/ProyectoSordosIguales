<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>

    <div class="container">
        <h2>Seleccione Tipo de Consulta</h2>
        <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Seleccionar
                <span class="caret"></span></button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Consultas</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Voluntarios</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Denuncia</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Otros</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">FAQ</a></li>
            </ul>
        </div>
    </div>

    </body>
    </html>
</html>
