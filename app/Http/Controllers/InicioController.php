<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Perfil;
use Illuminate\Http\Request;
use App\Models\PuntoEncuentro;
use App\Models\ZonaDeRiesgo;
use App\Models\ZonaSegura;
class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('General.Users.inicio');
    }

    public function swipeperfiles()
    {
        $usuarios = User::with('perfil')->get();
        return view('General.Users.partials.swipe_perfiles', compact("usuarios"));
    }


    public function zonariesgo()
    {
        $Puntos = ZonaDeRiesgo::all();

        return view('General.Users.partials.zona_riesgo', compact('Puntos'));
    }

    public function zonasegura()
    {
        $Puntos = ZonaSegura::all();
        return view('General.Users.partials.zona_segura', compact('Puntos'));
    }

    public function puntoencuentro()
    {
        $Puntos = PuntoEncuentro::all();
        return view('General.Users.partials.punto_encuentro', compact('Puntos'));
    }

    public function perfil()
    {
        $usuario = User::with('perfil')->find(Auth::id()); // 👈 Encuentra el usuario autenticado con la relación cargada
        return view('General.Users.partials.perfil.perfil', compact('usuario'));
    }








    public function admin()
    {
        return view('Admin.admin');
    }





    public function adminzonasseguras()
    {

        $zonasS = ZonaSegura::all();


        return view('Admin.partials.zonasseguras.zonas_seguras', compact("zonasS"));
    }
    // Mostrar el formulario de edición
    public function adminzonasseguraseditar($id)
    {
        $zona = ZonaSegura::findOrFail($id);
        return view('Admin.partials.zonasseguras.partials.zs_editar', compact('zona'));
    }

    // Guardar cambios de edición
    public function adminzonasseguraseditarguardar(Request $request, $id)
    {
        $zona = ZonaSegura::findOrFail($id);
        $zona->update($request->only([
            'nombre','tipo','descripcion','latitud','longitud','radio_metros'
        ]));

        $zonasS = ZonaSegura::all();
        return view('Admin.partials.zonasseguras.partials.zs_tabla', compact('zonasS'));
    }

    public function adminzonassegurasnuevo()
    {
        // Renderiza el formulario para crear cliente
        return view("Admin.partials.zonasseguras.partials.zs_nuevo");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function adminzonassegurasnuevoguardar(Request $request)
    {


        // Capturar valores y almacenarlos en base de datos
        $datos = [

            'nombre' => $request->nombre,
            'tipo' => $request->tipo,
            'descripcion' => $request->descripcion,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
            'radio_metros' => $request->radio_metros,
        ];

        ZonaSegura::create($datos);

        $zonasS = ZonaSegura::all();


        return view('Admin.partials.zonasseguras.zonas_seguras', compact("zonasS"));
    }

    public function adminzonasseguraseliminar($id)
    {
        $zona = ZonaSegura::find($id);

        if ($zona) {
            $zona->delete();
        }

        $zonasS = ZonaSegura::all();

        // Retorna solo la tabla actualizada (fragmento parcial)
        return view('Admin.partials.zonasseguras.partials.zs_tabla', compact("zonasS"));
    }













    public function adminzonasriesgoz()
    {
        $zonasR = ZonaDeRiesgo::all();
        return view('Admin.partials.zonasriesgoz.zonas_riesgoz', compact("zonasR"));
    }
    public function adminzonasriesgozeditar($id)
    {
        $zona = ZonaDeRiesgo::findOrFail($id);
        return view('Admin.partials.zonasriesgoz.partials.zr_editar', compact('zona'));
    }
    public function adminzonasriesgozeditarguardar(Request $request, $id)
    {
        $zona = ZonaDeRiesgo::findOrFail($id);
        $coords = [];
        for($i=1;$i<=4;$i++){
        $coords[]= [
            $request->input("latitud{$i}"),
            $request->input("longitud{$i}")
        ];
        }
        $zona->update([
        'nombre'      => $request->nombre,
        'tipo'        => $request->tipo,
        'descripcion' => $request->descripcion,
        'coordenadas' => json_encode($coords),
        'activa'      => $request->has('activa'),
        ]);
        $zonasR = ZonaDeRiesgo::all();
        return view('Admin.partials.zonasriesgoz.partials.zr_tabla', compact('zonasR'));
    }

    public function adminzonasriesgoznuevo(Request $request)
    {
        return view("Admin.partials.zonasriesgoz.partials.zr_nuevo");
    }

    public function adminzonasriesgoznuevoguardar(Request $request)
    {
        // Crear la zona y guardar sus 4 coordenadas serializadas
        $coords = [];
        for($i=1;$i<=4;$i++){
        $coords[]= [
            $request->input("latitud{$i}"),
            $request->input("longitud{$i}")
        ];
        }
        ZonaDeRiesgo::create([
        'nombre'      => $request->nombre,
        'tipo'        => $request->tipo,
        'descripcion' => $request->descripcion,
        'coordenadas' => json_encode($coords),
        'activa'      => $request->has('activa'),
        ]);
        $zonasR = ZonaDeRiesgo::all();
        return view('Admin.partials.zonasriesgoz.partials.zr_tabla', compact('zonasR'));
    }

    public function adminzonasriesgozeliminar($id)
    {
        $zona = ZonaDeRiesgo::find($id);
        if($zona) $zona->delete();
        $zonasR = ZonaDeRiesgo::all();
        return view('Admin.partials.zonasriesgoz.partials.zr_tabla', compact('zonasR'));
    }











    public function adminpuntosencuentro()
    {
        $Puntos = PuntoEncuentro::all();
        return view('Admin.partials.puntosencuentro.puntos_encuentro', compact("Puntos"));
    }

    // Mostrar el formulario de edición pre‑llenado
    public function adminpuntosencuentroeditar($id)
    {
        $punto = PuntoEncuentro::findOrFail($id);
        return view('Admin.partials.puntosencuentro.partials.pe_editar', compact('punto'));
    }

    // Guardar los cambios de edición
    public function adminpuntosencuentroeditarguardar(Request $request, $id)
    {
        $punto = PuntoEncuentro::findOrFail($id);
        $punto->update($request->only(['nombre','descripcion','latitud','longitud']));

        $Puntos = PuntoEncuentro::all();
        return view('Admin.partials.puntosencuentro.partials.pe_tabla', compact('Puntos'));
    }


    public function adminpuntosencuentronuevo(Request $request)
    {
        return view("Admin.partials.puntosencuentro.partials.pe_nuevo");
    }

    public function adminpuntosencuentronuevoguardar(Request $request)
    {


        // Capturar valores y almacenarlos en base de datos
        $datos = [

            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
        ];

        PuntoEncuentro::create($datos);
        $Puntos = PuntoEncuentro::all();
        return view('Admin.partials.puntosencuentro.puntos_encuentro', compact("Puntos"));
    }

    public function adminpuntosencuentroeliminar($id)
    {
        $punto = PuntoEncuentro::find($id);

        if ($punto) {
            $punto->delete();
        }

        $Puntos = PuntoEncuentro::all();

        // Retorna solo la tabla actualizada (fragmento parcial)
        return view('Admin.partials.puntosencuentro.partials.pe_tabla', compact("Puntos"));
    }










    public function perfileditar()
    {   
        $usuario = User::with('perfil')->find(Auth::id()); // 👈 Encuentra el usuario autenticado con la relación cargada
        return view('General.Users.partials.perfil.perfil_editar', compact('usuario'));
    }


    // Nuevo método de guardado/actualización
    public function perfileditarguardar(Request $request)
    {
        // 1. Obtén el usuario + perfil con la misma consulta de perfileditar
        $usuario = User::with('perfil')->find(Auth::id());



        // 3. Actualiza los campos de User y guarda
        $usuario->name       = $request->input('name');
        $usuario->first_name = $request->input('first_name');
        $usuario->last_name  = $request->input('last_name');
        $usuario->save();

        // 4. Prepara los datos del perfil
        $perfilData = [
            'instagram' => $request->input('instagram'),
            'facebook'  => $request->input('facebook'),
            'latitud'   => $request->input('latitud'),
            'longitud'  => $request->input('longitud'),
        ];

        // 5. Si existe perfil, asigna y save(); si no, créalo
        if ($usuario->perfil instanceof Perfil) {
            $perfil = $usuario->perfil;
            $perfil->instagram = $perfilData['instagram'];
            $perfil->facebook  = $perfilData['facebook'];
            $perfil->latitud   = $perfilData['latitud'];
            $perfil->longitud  = $perfilData['longitud'];
            $perfil->save();
        } else {
            // Asegúrate que 'user_id' es fillable en Perfil
            $usuario->perfil()->create($perfilData);
        }

        

        return view('General.Users.partials.perfil.perfil', compact('usuario'));
    }

}

