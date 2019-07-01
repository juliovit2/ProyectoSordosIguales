<div>
    <h3>Tipo de mensaje: {{$datos[0]}}</h3>
    <br>
    <b>Nombre:</b> {{ $datos[1] }}
    <br>
    <br>
    <b>Correo:</b> {{ $datos[2] }}
    <br>
    <br>
    <b>Mensaje:</b><br>
    {!!html_entity_decode($datos[3])!!}
    <br>
    <br>
    <b>Nombre del archivo:</b> {!!html_entity_decode($datos[4])!!}<br>
</div>
