{{csrf_field()}}
<div class="form-col">

    <div class="col-md-4 mb-3">
        <p align="left">Nombre</p>
        <input type="text"
               name="name"
               class="form-control"
               id="name"
               placeholder="Ingrese nombre"
               value="{{ old('name', $user->name) }}" readonly required>
    </div>

    <div class="col-md-4 mb-3">
        <p align="left">RUT</p>
        <input type="text"
               name="rut"
               class="form-control"
               id="rut"
               placeholder="Ingrese RUT"
               value="{{ old('name', $user->rut) }}" readonly required>
    </div>

    <div class="col-md-4 mb-3">
        <p align="left">Correo Electrónico</p>
        <input type="email"
               name="email"
               class="form-control"
               id="email"
               placeholder="Ingrese correo"
               value="{{ old('email', $user->email) }}" required>
    </div>

    <div class="col-md-4 mb-3">
        <p align="left">Teléfono</p>
        <input type="text"
               name="telefono"
               class="form-control"
               id="telefono"
               placeholder="Ingrese teléfono"
               value="{{ old('name', $user->telefono) }}" required>
    </div>

    <div class="col-md-4 mb-3">
        <p align="left">Dirección</p>
        <input type="text"
               name="direccion"
               class="form-control"
               id="direccion"
               placeholder="Ingrese dirección"
               value="{{ old('name', $user->direccion) }}" required>
    </div>

    <div class="col-md-4 mb-3">
        <p align="left">Ciudad</p>
        <input type="text"
               name="ciudad"
               class="form-control"
               id="ciudad"
               placeholder="Ingrese ciudad"
               value="{{ old('name', $user->ciudad) }}" required>
    </div>

    <div class="col-md-4 mb-3">
        <p align="left">Contraseña</p>
        <input type="password"
               name="password"
               class="form-control"
               id="password"
               placeholder="Ingrese contraseña"
               value="{{ old('name', $user->password) }}" required>
    </div>
</div>