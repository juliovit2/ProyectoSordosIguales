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
        if($this->valida_rut($request->rut)) {
            $request->createUser();
            return redirect()->route('users.index');
        }
        return back()->with('error','ERROR: Formato rut incorrecto');
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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function valida_rut($rut)
    {
        if (!preg_match("/^[0-9.]+[-]?+[0-9kK]{1}/", $rut)) {
            return false;
        }
        $rut = preg_replace('/[\.\-]/i', '', $rut);
        $dv = substr($rut, -1);
        $numero = substr($rut, 0, strlen($rut) - 1);
        $i = 2;
        $suma = 0;
        foreach (array_reverse(str_split($numero)) as $v) {
            if ($i == 8)
                $i = 2;
            $suma += $v * $i;
            ++$i;
        }
        $dvr = 11 - ($suma % 11);
        if ($dvr == 11)
            $dvr = 0;
        if ($dvr == 10)
            $dvr = 'K';
        if ($dvr == strtoupper($dv))
            return true;
        else
            return false;
    }
}
