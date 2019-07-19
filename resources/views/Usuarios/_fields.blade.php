{{csrf_field()}}
<div class="form-col">

    <?php if ($tipo==1): ?>

        <div class="col-md-4 mb-3">
            <p align="left">Nombre</p>
            <input type="text"
                   name="name"
                   class="form-control"
                   id="name"
                   placeholder="Ingrese nombre"
                   pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"
                   value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="col-md-4 mb-3">
            <p align="left">RUT</p>
            <input type="text"
                   name="rut"
                   class="form-control"
                   id="rut"
                   placeholder="Ingrese RUT"
                   value="{{ old('name', $user->rut) }}" required>
        </div>

    <?php else: ?>

        <div class="col-md-4 mb-3">
            <p align="left">Nombre</p>
            <input type="text"
                   name="name"
                   class="form-control"
                   id="name"
                   placeholder="Ingrese nombre"
                   pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"
                   value="{{ old('name', $user->name) }}" readonly required>
        </div>

        <div class="col-md-4 mb-3">
            <p align="left">RUT</p>
            <input type="text"
                   name="rut"
                   class="form-control"
                   id="rut"
                   placeholder="Ingrese RUT"
                   value="{{ old('rut', $user->rut) }}" readonly required>
        </div>

    <?php endif ?>


    <div class="col-md-4 mb-3">
        <p align="left">Correo Electrónico</p>
        <input type="email"
               name="email"
               class="form-control"
               id="email"
               placeholder="Ingrese correo - Ej: correo@ejemplo.cl"
               pattern="([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})"
               value="{{ old('email', $user->email) }}" required>
    </div>

    <div class="col-md-4 mb-3">
        <p align="left">Teléfono</p>
        <input type="text"
               name="telefono"
               class="form-control"
               id="telefono"
               placeholder="Ingrese teléfono - Ej: 87654321"
               pattern="[3-9][0-9]{7}"
               value="{{ old('telefono', $user->telefono) }}" required>
    </div>

    <div class="col-md-4 mb-3">
        <p align="left">Dirección</p>
        <input type="text"
               name="direccion"
               class="form-control"
               id="direccion"
               placeholder="Ingrese dirección - Ej: calle 1234"
               pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+[\s][1-9][0-9]+"
               value="{{ old('direccion', $user->direccion) }}" required>
    </div>


    <div class="col-md-4 mb-3">
        <p align="left">Ciudad</p>
        <select name="ciudad" id="ciudad" class="form-control">
            <option value="">Seleccione una ciudad</option>
            <option value="Antofagasta"{{ old('ciudad', $user->ciudad) == "Antofagasta" ? 'selected' : '' }}>Antofagasta</option>
            <option value="Calama"{{ old('ciudad', $user->ciudad) == "Calama" ? 'selected' : '' }}>Calama</option>
            <option value="María Helena"{{ old('ciudad', $user->ciudad) == "María Helena" ? 'selected' : '' }}>María Helena</option>
            <option value="Mejillones"{{ old('ciudad', $user->ciudad) == "Mejillones" ? 'selected' : '' }}>Mejillones</option>
            <option value="Ollague"{{ old('ciudad', $user->ciudad) == "Ollague" ? 'selected' : '' }}>Ollague</option>
            <option value="San Pedro de Atacama"{{ old('ciudad', $user->ciudad) == "San Pedro de Atacama" ? 'selected' : '' }}>San Pedro de Atacama</option>
            <option value="Sierra Gorda"{{ old('ciudad', $user->ciudad) == "Sierra Gorda" ? 'selected' : '' }}>Sierra Gorda</option>
            <option value="Taltal"{{ old('ciudad', $user->ciudad) == "Taltal" ? 'selected' : '' }}>Taltal</option>
            <option value="Tocopilla"{{ old('ciudad', $user->ciudad) == "Tocopilla" ? 'selected' : '' }}>Tocopilla</option>
        </select>
    </div>

    <div class="col-md-4 mb-3">
        <p align="left">Contraseña</p>
        <input type="password"
               name="password"
               class="form-control"
               id="password"
               placeholder="Ingrese contraseña"
               minlength="6"
               pattern="[^\s]*"
               value="{{ old('password', $user->password) }}" required>
    </div>
</div>