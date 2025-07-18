@extends('layout.app_all')

@section('contenido')



    <div id="formulario" 
        class="h-screen bg-[#7b8127] rounded-xl p-6 overflow-auto"
        hx-get="/perfil/" 
        hx-trigger="load" 
        hx-swap="innerHTML">
    </div>

    <footer>
        <div class="nav-buttons">

            <div class="nav-btn">
                <button hx-get="{{ url('/zona-riesgo') }}" hx-target="#formulario" hx-swap="innerHTML" title="Alerta">
                    <i>🗺️</i>
                </button>
            </div>

            <div class="nav-btn">
                <button hx-get="{{ url('/zona-segura') }}" hx-target="#formulario" hx-swap="innerHTML" title="Refugio">
                    <i>🔓</i>
                </button>
            </div>

            <div class="nav-btn">
                <button hx-get="{{ url('/punto-encuentro') }}" hx-target="#formulario" hx-swap="innerHTML" title="Encuentro">
                    <i>📍</i>
                </button>
            </div>



            <div class="nav-btn">
                @if(auth()->check() && auth()->user()->is_admin)
                    <button hx-get="{{ url('/admin') }}" hx-target="#formulario" hx-swap="innerHTML" title="Admin">
                        <i>🛠️</i>
                    </button>
                @endif
            </div>
            
        </div>
    </footer>

@endsection
