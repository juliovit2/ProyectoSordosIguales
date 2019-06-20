{{csrf_field()}}
<div class="form-row">
    <div class="col-md-4 mb-3">
        <label for="name">Nombre del Curso:</label>
        <input type="text"
               name="name"
               class="form-control is-valid"
               id="name"
               placeholder="Lenguaje de Señas Básico"
               value="{{ old('name', $curso->name) }}" required>
    </div>
    <div class="col-md-4 mb-3">
        <label for="profesor">Profesor Encargado:</label>
        <input type="text"
               name="profesor"
               class="form-control is-valid"
               id="profesor"
               placeholder="Glenn Gomez"
               value="{{ old('profesor', $curso->profesor) }}" required>
    </div>
</div>
