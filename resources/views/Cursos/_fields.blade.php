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

    {{--Listado desplegable dinamico--}}

    @php
        $personas = \App\tabla_persona::all();
    @endphp
    <div class="col-md-4 mb-3">
        <p align="left">Profesor Encargado</p>
        <select name="profesor" id="profesor" class="form-control">
            <option value="">Seleccione un profesor</option>
            @foreach($personas as $persona)
                @if($persona->rol == "Profesor")
                    <option value="{{ $persona->id }}"}}>
                        {{ $persona->rut . " - " . $persona->nombre }}
                    </option>
                @endif
            @endforeach
        </select>
    </div>
</div>
