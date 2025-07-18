@extends('layout.app')

@section('contenido')

<div class="min-h-screen flex flex-col items-center justify-center bg-gray-100 py-8 px-4">
  <h1 class="text-4xl font-extrabold text-gray-800 mb-8">🎯 Bienvenido a <span class="text-blue-600">Zone</span></h1>

  <div class="flex flex-col sm:flex-row gap-4 mb-6">
    <button 
      class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 transition"
      hx-get="{{ url('/formLogin') }}" 
      hx-target="#formulario" 
      hx-swap="innerHTML">
      Iniciar Sesión
    </button>

    <button 
      class="bg-green-600 text-white px-6 py-2 rounded-lg shadow hover:bg-green-700 transition"
      hx-get="{{ url('/formRegistro') }}" 
      hx-target="#formulario" 
      hx-swap="innerHTML">
      Registrarse
    </button>

    <button 
      class="bg-purple-600 text-white px-6 py-2 rounded-lg shadow hover:bg-purple-700 transition"
      hx-get="{{ url('/formExtras') }}" 
      hx-target="#formulario" 
      hx-swap="innerHTML">
      Extra
    </button>
  </div>

  <div id="formulario" class="w-full sm:w-[480px] bg-white p-6 rounded-xl shadow-md border border-gray-200">
    <!-- Aquí se cargan los formularios con HTMX -->
  </div>
</div>

@if(session('mensaje'))
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      Swal.fire({
        text: @json(session('mensaje')),
        icon: '{{ session('tipo') == 'error' ? 'error' : 'success' }}',
        confirmButtonText: 'OK'
      });
    });
  </script>
@endif

<script>
  $.validator.addMethod("utcEmailOnly", function (value, element) {
    return this.optional(element) || /^[a-zA-Z0-9._%+-]+@utc\.edu\.ec$/i.test(value);
  }, "Solo correos @utc.edu.ec son permitidos.");

  function activarValidacion() {
    const validaciones = {
      formLogin: {
        rules: {
          email: { required: true, email: true, utcEmailOnly: true },
          password: { required: () => !$("input[name='codigo']").length }
        },
        messages: {
          email: {
            required: "Correo requerido",
            email: "Correo inválido",
            utcEmailOnly: "Solo correos @utc.edu.ec"
          },
          password: "Contraseña requerida"
        }
      },
      formRegistro: {
        rules: {
          username: "required",
          first_name: "required",
          last_name: "required",
          email: { required: true, email: true, utcEmailOnly: true },
          password: { required: true, minlength: 6 }
        },
        messages: {
          username: "Campo requerido",
          first_name: "Campo requerido",
          last_name: "Campo requerido",
          email: {
            required: "Correo requerido",
            email: "Correo inválido",
            utcEmailOnly: "Solo correos @utc.edu.ec"
          },
          password: {
            required: "Campo requerido",
            minlength: "Mínimo 6 caracteres"
          }
        }
      },
      formVerificar: {
        rules: {
          email: { required: true, email: true, utcEmailOnly: true },
          codigo: { required: true, minlength: 6, maxlength: 6 }
        },
        messages: {
          email: {
            required: "Correo requerido",
            email: "Correo inválido",
            utcEmailOnly: "Solo correos @utc.edu.ec"
          },
          codigo: {
            required: "Código requerido",
            minlength: "Debe tener 6 caracteres",
            maxlength: "Debe tener 6 caracteres"
          }
        }
      }
    };

    Object.entries(validaciones).forEach(([formId, config]) => {
      const form = $("#" + formId);
      if (form.length) form.validate(config);
    });
  }

  $(activarValidacion);

  document.body.addEventListener("htmx:afterSwap", e => {
    if (e.target.id === "formulario") {
      setTimeout(activarValidacion, 10);
    }
  });
</script>

@endsection
