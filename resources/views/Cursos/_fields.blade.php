{{csrf_field()}}
<div class="form-col">

    <div class="col-md-4 mb-3">
        <p align="left">Nombre del Curso</p>
        <input type="text"
               name="name"
               class="form-control"
               id="name"
               placeholder="Ingrese nombre del Curso"
               value="{{ old('name', $curso->nombre) }}" required>
    </div>

    <div class="col-md-4 mb-3">
        <p align="left">Profesor Encargado</p>
        <input type="text"
               name="profesor"
               class="form-control"
               id="profesor"
               placeholder="Ingrese nombre del Profesor"
               value="{{ old('profesor', $curso->profesor) }}" required>
    </div>
</div>
