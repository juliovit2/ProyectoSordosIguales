<?php
namespace App\Http\Controllers;
use App\User;
use App\Http\Forms\UserForm;
use Illuminate\Validation\Rule;
use App\Http\Requests\CreateUserRequest;
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $title = 'Listado de estudiantes';
        return view('Usuarios.index', compact('title', 'users'));
    }

    public function show(User $user)
    {
        return view('Usuarios.Show', compact('user'));
    }

    public function create()
    {

        return new UserForm('Usuarios.Create', new User);

    }
    public function store(CreateUserRequest $request )
    {
        $request->createUser();

        return redirect()->route('users.index');
    }



    public function edit(User $user)
    {
        return new UserForm('Usuarios.Edit', $user);
    }

    public function update(User $user)
    {

        $data = request()->validate([
            'name' => 'required',
            'rut' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => '',
            'direccion' => 'required',
            'telefono' => 'required',
            'ciudad' => 'required'
        ]);

        if ($data['password'] != null) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        $user->update($data);
        return redirect()->route('users.show', ['user' => $user]);
    }

    function destroy(User $user){

        $user->delete();

        return redirect()->route('users.index');
    }

}
