{{csrf_field()}}
<div class="form-row">
    <div class="col-md-4 mb-3">
        <label for="name">Nombre del Curso:</label>
        <input type="text"
               name="name"
               class="form-control is-valid"
               id="name"
               placeholder="Nombre"
               value="{{ old('name', $curso->name) }}" required>
    </div>
    <div class="col-md-4 mb-3">
        <label for="profesorid">Profesor Encargado:</label>
        <input type="text"
               name="profesorid"
               class="form-control is-valid"
               id="profesorid"
               placeholder="Manuel Chuleta"
               value="{{ old('profesorid', $curso->profesorid) }}" required>
    </div>
</div>
