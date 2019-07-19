<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
<div class="container-fluid">
    <div class="row border">
        <div class="col-sm-2  ">
            <a href="http://sordosiguales.net/" rel="home">
                <img class = "img" src="{{"/storage/logo_fundacion.png"}}" style ="width:150px;height: 150px;float: right;" alt="SordosIguales">
            </a>
        </div>
        <div class="col-sm-8 align-self-center" style="color:#2980b9;font-size: 14px;font-family: 'Arial', sans-serif !important; font-style: italic;">
            <h1 align="center"  style="font-size: 400%">Fundación <span style="color: #972329">SORDOS IGUALES</span></h1>
        </div>
        <div class="col-sm-2  align-self-center" style="font-size:200%">
            <a class = "headerLink" href = "monkey.png"><i class="fab fa-twitter-square"></i></a>
            <a class = "headerLink" href = "https://www.facebook.com/SordosIguales/"><i class="fab fa-facebook"></i></a>
            <a class = "headerLink" href = "monkey.png"><i class="fab fa-instagram"></i></a>
            <a class = "headerLink" href = "monkey.png"><i class="fab fa-whatsapp"></i></a>
            <a class = "headerLink" href = "/donaciones"><i class="fas fa-donate"></i>
            </div>
        </div>




</div>
<nav class="navbar-default navbar navbar-expand-md">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto" >
            <li class="nav-item"
                data-toggle="popover" 
                data-img="{{ asset('storage/header/contactenos.gif')}}"
                data-trigger="hover" 
                data-placement="top">
                <a class="nav-link" href={{'/'}}><h4><span class="textoHeader"><i class="fas fa-home"></i>  Inicio</span></h4></a>
            </li>
            <li class="nav-item dropdown"
                data-toggle="popover" 
                data-img="{{ asset('storage/header/contactenos.gif')}}"
                data-trigger="hover" 
                data-placement="top">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <h4><span class="textoHeader"><i class="fas fa-info-circle"></i> Información</span></h4>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a data-toggle="popover"
                       data-img="{{ asset('storage/header/que_somos.gif')}}"
                       data-trigger="hover"
                       class="nav-link dropdown-item" href={{"/documentos"}}><h4><span class="textoHeader"><i class="fas fa-file"></i>  Documentos</span></h4></a>
                    <a data-toggle="popover"
                       data-img="{{ asset('storage/header/que_somos.gif')}}"
                       data-trigger="hover"
                       class="nav-link dropdown-item" href={{"/informacion"}}><h4><span class="textoHeader"><i class="fas fa-question-circle"></i>  ¿Quienes Somos?</span></h4></a>
                </div>
            </li>
            <li class="nav-item"
                data-toggle="popover"
                data-img="{{ asset('storage/header/NOTISEÑAS.gif')}}"
                data-trigger="hover" 
                data-placement="top">
                <a class="nav-link" href={{"/noticias"}}><h4><span class="textoHeader"><i class="far fa-newspaper"></i>  Noticias y Articulos</span></h4></a>
            </li>
            <li class="nav-item"
                data-toggle="popover" 
                data-img="{{ asset('storage/header/contactenos.gif')}}"
                data-trigger="hover" 
                data-placement="top">
                <a class="nav-link" href="/faq/show"><h4><span class="textoHeader"><i class="far fa-question-circle"></i>  Preguntas Frecuentes</span></h4></a>
            </li>
            <li class="nav-item"
                data-toggle="popover" 
                data-img="{{ asset('storage/header/contactenos.gif')}}"
                data-trigger="hover" 
                data-placement="top">
                <a class="nav-link" href="{{'/contacto'}}"><h4><span class="textoHeader"><i class="fas fa-phone"></i>  Contacto</span></h4></a>
            </li>
            <li class="nav-item"
                data-toggle="popover"
                data-img="{{ asset('storage/header/contactenos.gif')}}"
                data-trigger="hover"
                data-placement="top">
                <a class="nav-link" href="{{'/redes'}}"><h4><span class="textoHeader"><i class="fas fa-globe-americas"></i>  Redes</span></h4></a>
            </li>
            <li class="nav-item"
                data-toggle="popover" 
                data-img="{{ asset('storage/header/contactenos.gif')}}"
                data-trigger="hover" 
                data-placement="top">
                <a class="nav-link" href="{{'/login'}}"><h4><span class="textoHeader"><i class="fas fa-th"></i>  Plataforma</span></h4></a>
            </li>
        </ul>

    </div>
</nav>

<script>
    $('[data-toggle="popover"]').popover({
      html: true,
      trigger: 'hover',
      placement: 'top',
      content: function () { return '<img src="' + $(this).data('img') + '"  width="100%" />'; }
    });
</script>