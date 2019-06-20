{{csrf_field()}}
<div class="form-row">

    <div class="col-md-4 mb-3">
        <label for="name">Nombre:</label>
        <input type="text"
               name="name"
               class="form-control is-valid"
               id="name"
               placeholder="Nombre"
               value="{{ old('name', $user->name) }}" required>
    </div>

    <div class="col-md-4 mb-3">
        <label for="name">RUT:</label>
        <input type="text"
               name="rut"
               class="form-control is-valid"
               id="rut"
               placeholder="RUT"
               value="{{ old('name', $user->rut) }}" required>
    </div>

    <div class="col-md-4 mb-3">
        <label for="name">Correo Electrónico:</label>
        <input type="email"
               name="email"
               class="form-control is-valid"
               id="email"
               placeholder="example@example.com"
               value="{{ old('email', $user->email) }}" required>
    </div>

    <div class="col-md-4 mb-3">
        <label for="password">Contraseña:</label>
        <input type="password"
               name="password"
               class="form-control is-valid"
               id="password"
               placeholder="Contraseña" required>
    </div>

    <div class="col-md-4 mb-3">
        <label for="name">Direccion:</label>
        <input type="text"
               name="direccion"
               class="form-control is-valid"
               id="direccion"
               placeholder="Dirección"
               value="{{ old('name', $user->Direccion) }}" required>
    </div>


    <div class="col-md-4 mb-3">
        <label for="name">Teléfono:</label>
        <input type="text"
               name="telefono"
               class="form-control is-valid"
               id="telefono"
               placeholder="Teléfono"
               value="{{ old('name', $user->telefono) }}" required>
    </div>

    <div class="col-md-4 mb-3">
        <label for="name">Ciudad:</label>
        <input type="text"
               name="ciudad"
               class="form-control is-valid"
               id="ciudad"
               placeholder="Ciudad"
               value="{{ old('name', $user->ciudad) }}" required>
    </div>





</div>
