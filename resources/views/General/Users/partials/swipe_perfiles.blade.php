
<div class="swiper h-full w-full"> <!-- Contenedor principal -->
  <div class="swiper-wrapper">
    @foreach($usuarios as $usuario)
      <!-- Cada slide ocupa toda la pantalla -->
      <div class="swiper-slide flex-col items-center justify-center bg-red-500">

        
        <h1>{{ $usuario->id }}</h1>
        <p >{{ $usuario->name }}</p>
        <li>{{ $usuario->first_name }} {{ $usuario->last_name }}</li>
        <p>{{ $usuario->email }}</p>
        <p>Instagram: {{ $usuario->perfil->instagram ?? 'No disponible' }}</p>
        <p>Facebook: {{ $usuario->perfil->facebook ?? 'No disponible' }}</p>




      </div>
    @endforeach
  </div>
</div>
