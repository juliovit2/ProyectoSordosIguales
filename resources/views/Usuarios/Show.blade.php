@extends('layout')

@section('title', "Usuario {$user->id}")

@section('content')

    <div class="card">
        <h4 class="card-header">
            <div class="form-row">
                Detalles del Usuario #{{ $user->id }}
                <form action="{{ route('users.destroy', $user) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
                    <button type="submit" class="btn btn-link"><span class="oi oi-trash"></span></button>
                </form>
            </div>
        </h4>

        <div class="card-body">

           <table class="table">
               <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Twitter</th>
                    </tr>
               </thead>

               <tbody>
                    <tr>
                        <th>{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->twitter }}</td>
                    </tr>
               </tbody>
           </table>
            <a href=" {{route('users.index')}} " class="btn btn-link"> Regresar </a>

        </div>
    </div>

@endsection