{{csrf_field()}}
<div class="form-col">


    <div class="col-md-4 mb-3">
        <p align="left">Nombre</p>
        <input type="text"
               name="nombre"
               class="form-control"
               id="nombre"
               placeholder="Ingrese nombre"
               pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"
               value="{{ old('nombre', $profesor->nombre) }}" required>
    </div>

    <div class="col-md-4 mb-3">
        <p align="left">RUT</p>
        <input type="text"
               name="rut"
               class="form-control"
               id="rut"
               placeholder="Ingrese RUT"
               value="{{ old('rut', $profesor->rut) }}" required>
    </div>


    <div class="col-md-4 mb-3">
        <p align="left">Correo Electrónico</p>
        <input type="email"
               name="correo"
               class="form-control"
               id="correo"
               placeholder="Ingrese correo"
               pattern="([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})"
               value="{{ old('correo', $profesor->correo) }}" required>
    </div>

    <div class="col-md-4 mb-3">
        <p align="left">Teléfono</p>
        <input type="text"
               name="telefono"
               class="form-control"
               id="telefono"
               placeholder="Ingrese teléfono"
               pattern="[3-9][0-9]{7}"
               value="{{ old('telefono', $profesor->telefono) }}" required>
    </div>

</div>