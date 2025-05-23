<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function adduser()
    {
        return view('admin.users.store');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s\-]+$/u'
            ],
            'lastName' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s\-]+$/u'
            ],
            'genre' => 'required|in:male,female',
            'age' => 'required|integer|min:0',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'is_admin' => 'nullable|boolean',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.regex' => 'El nombre solo puede contener letras, espacios y guiones.',
            'lastName.required' => 'El apellido es obligatorio.',
            'lastName.regex' => 'El apellido solo puede contener letras, espacios y guiones.',
            'genre.required' => 'El género es obligatorio.',
            'genre.in' => 'El género seleccionado no es válido.',
            'age.required' => 'La edad es obligatoria.',
            'age.integer' => 'La edad debe ser un número entero.',
            'age.min' => 'La edad debe ser mayor o igual a 0.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico no es válido.',
            'email.unique' => 'El correo electrónico ya está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);
    
        $user = new User();
        $user->name = $validated['name'];
        $user->lastName = $validated['lastName'];
        $user->genre = $validated['genre'];
        $user->age = $validated['age'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);
        $user->is_admin = $request->has('is_admin');
        $user->save();
    
        return redirect()->route('admin.users.index')->with('success', 'Usuario creado correctamente.');
    }

    public function edit($id)
    {
        $user = User::where('id_user', $id)->firstOrFail();
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id_user', $id)->firstOrFail();

        $validated = $request->validate([
        'name' => [
            'required',
            'string',
            'max:255',
            'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s\-]+$/u'
        ],
        'lastName' => [
            'required',
            'string',
            'max:255',
            'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s\-]+$/u'
        ],
        'genre' => 'required|in:male,female',
        'age' => 'required|integer|min:0',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
        'is_admin' => 'nullable|boolean',
    ], [
        'name.required' => 'El nombre es obligatorio.',
        'name.regex' => 'El nombre solo puede contener letras, espacios y guiones.',
        'lastName.required' => 'El apellido es obligatorio.',
        'lastName.regex' => 'El apellido solo puede contener letras, espacios y guiones.',
        'genre.required' => 'El género es obligatorio.',
        'genre.in' => 'El género seleccionado no es válido.',
        'age.required' => 'La edad es obligatoria.',
        'age.integer' => 'La edad debe ser un número entero.',
        'age.min' => 'La edad debe ser mayor o igual a 0.',
        'email.required' => 'El correo electrónico es obligatorio.',
        'email.email' => 'El correo electrónico no es válido.',
        'email.unique' => 'El correo electrónico ya está registrado.',
        'password.required' => 'La contraseña es obligatoria.',
        'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
        'password.confirmed' => 'Las contraseñas no coinciden.',
    ]);

        $user->name = $validated['name'];
        $user->lastName = $validated['lastName'];
        $user->genre = $validated['genre'];
        $user->age = $validated['age'];
        $user->email = $validated['email'];
        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }
        $user->is_admin = $request->has('is_admin');
        $user->save();

        return redirect()->route('users')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy($id)
    {
        User::where('id_user', $id)->delete();
        return redirect()->route('users')->with('success', 'Usuario eliminado correctamente.');
    }
}