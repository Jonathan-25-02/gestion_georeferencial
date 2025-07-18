<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Mail\Mensaje_Correo;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class RegistroUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view("General.registro_login.principal");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $codigo = Str::upper(Str::random(6));
        // Verificar si ya existe un usuario con ese email
        if (User::where('email', $request->input('email'))->exists()) {
            return redirect()->back()->with([
                'mensaje' => 'El correo ya está registrado.',
                'tipo' => 'error',
            ]);
        }

        $user = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'name' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'is_active' => false,
            'activation_code' => $codigo,
        ]);

        // El mensaje HTML completo
        $asunto = "Código de Activación";
        $mensajeHTML = "
            <h2>Hola {$user->name}</h2>
            <p>Tu código de activación es: <strong>{$codigo}</strong></p>
            <p>Ingresa este código en la app para activar tu cuenta.</p>
        ";

        // Se envía TODO desde aquí
        Mail::to($user->email)->send(
            (new Mensaje_Correo($mensajeHTML))->subject($asunto)
        );

        return redirect()->back()->with([
            'mensaje' => 'Registro exitoso. Revisa tu correo para activar tu cuenta.',
            'tipo' => 'success',
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }




    public function formRegistro()
    {
        return view('General.registro_login.partials.form_registro');
    }

    public function formLogin()
    {
        return view('General.registro_login.partials.form_login');
    }

    public function formExtras()
    {
        return view('General.registro_login.partials.extra.form_extras');
    }

    public function formRecuperar()
    {
        return view('General.registro_login.partials.extra.partials.form_recuperar');
    }

    public function formVerificar()
    {
        return view('General.registro_login.partials.extra.partials.form_verificar');
    }








    public function iniciarSesion(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return redirect()->back()->with([
                'mensaje' => 'Usuario no encontrado.',
                'tipo' => 'error',
            ]);
        }

        if (!$user->is_active) {
            return redirect()->back()->with([
                'mensaje' => 'Tu cuenta no está activada. Por favor verifica tu correo y activa tu cuenta.',
                'tipo' => 'warning',
            ]);
        }

        if (Auth::attempt($credentials)) {
            // Login correcto, sesión iniciada automáticamente
            $request->session()->regenerate();

            return redirect('/inicio')->with([
                'mensaje' => 'Bienvenido, ' . $user->name,
                'tipo' => 'success',
            ]);
        }

        return redirect()->back()->with([
            'mensaje' => 'Contraseña incorrecta.',
            'tipo' => 'error',
        ]);
    }






    public function verificarCodigo(Request $request)
    {
        $email = $request->input('email');
        $codigo = strtoupper($request->input('codigo'));

        // Buscar usuario por email
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with([
                'mensaje' => 'Usuario no encontrado.',
                'tipo' => 'error',
            ]);
        }

        // Verificar código de activación
        if ($user->activation_code !== $codigo) {
            return redirect()->back()->with([
                'mensaje' => 'Código de activación incorrecto.',
                'tipo' => 'error',
            ]);
        }

        // Activar cuenta
        $user->is_active = true;
        $user->email_verified_at = now();
        $user->save();

        return redirect('/register')->with([
            'mensaje' => 'Cuenta activada correctamente. Ya puedes iniciar sesión.',
            'tipo' => 'success',
        ]);
    }

}
