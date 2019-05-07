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
                <!--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Consultas</a></li>-->
                <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Consulta</button>
                <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo1">Voluntario</button>

                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Voluntarios</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Denuncia</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Otros</a></li>
                <li role="presentation" class="divider"></li>


            </ul>

            <!--Formulario Consulta-->
            <div id="demo" class="collapse">
                <form name="FormularioConsulta" method="post">
                    <br />
                    <p>Asegurece que su consulta no se encuentre en <a> <!--href="enlacepagina.html"-->FAQ</a></p>
                    <br />

                    <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" placeholder="name">
                    </div>

                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>

                    <br />
                    <textarea name="comentarios" rows="10" cols="40">Escribe aquí tu consulta</textarea>

                </form>
            </div>

            <!-- Formulario Voluntarios-->
            <div id="demo1" class="collapse">
                wena wena
            </div>

        </div>

    </div>

    </body>
    </html>
</html>
