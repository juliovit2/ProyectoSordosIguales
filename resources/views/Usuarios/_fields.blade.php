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

<div class="form-row">
    <div class="col-md-4 mb-3">
        <label for="bio">Bio:</label>
        <textarea name="bio"
                  class="form-control"
                  id="bio">{{ old('bio', $user->profile->bio) }}</textarea>
    </div>
</div>

<div class="form-row">
    <div class="col-md-4 mb-3">
        <label for="profession_id">Profesión:</label>
        <select name="profession_id" id="profession_id" class="form-control">
            <option value="">Selecciona una Profesión</option>
            @foreach($professions as $profession)
                <option value="{{ $profession->id }}"{{ old('profession_id, $user->profile->profession_id') == $profession->id ? ' selected' : '' }}>
                    {{ $profession->title }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-row">
    <div class="col-md-4 mb-3">
        <label for="twitter">Twitter:</label>
        <input type="text"
               name="twitter"
               class="form-control is-valid"
               id="twitter"
               placeholder="https://twitter.com/example"
               value="{{ old('twitter', $user->profile->twitter) }}">
    </div>
</div>

<h5>Habilidades</h5>
@foreach($skills as $skill)
    <div class="form-check form-check-inline">
        <input name="skills[{{$skill->id}}]"
               class="form-check-input"
               type="checkbox"
               id="skill_{{$skill->id}}"
               value="{{$skill->id}}"
                {{ $errors->any() ? old("skills.{$skill->id}") : $user->skills->contains($skill) ? 'checked' : '' }}>
        <label class="form-check-label" for="skill_{{$skill->id}}">{{$skill->name }}</label>
    </div>
@endforeach

<h5 class="mt-3">Rol</h5>

@foreach($roles as $role => $name)
    <div class="form-check form-check-inline">
        <input class="form-check-input"
               type="radio"
               name="role"
               id="role_{{$role}}"
               value="{{$role}}"
                {{old('role', $user->role)== $role ? 'checked' : ''}}>
        <label class="form-check-label" for="role_{{$role}}">{{ $name }}</label>
    </div>
@endforeach