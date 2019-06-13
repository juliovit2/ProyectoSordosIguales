{{csrf_field()}}
<div class="form-row">
    <div class="col-md-4 mb-3">
        <label for="name">Nombre:</label>
        <input type="text"
               name="name"
               class="form-control is-valid"
               id="name"
               placeholder="nombre apellido"
               value="{{ old('name', $user->name) }}" required>
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
</div>
