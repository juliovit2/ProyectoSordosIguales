<?php
namespace App\Http\Controllers;
use App\{Http\Requests\CreateUserRequest, Profession, Skill, User, UserProfile};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
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
        $user = new user;

        return view('Usuarios.Create', compact('user'));
    }

    public function store(CreateUserRequest $request )
    {
        $request->createUser();

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('Usuarios.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validated([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => '',
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
