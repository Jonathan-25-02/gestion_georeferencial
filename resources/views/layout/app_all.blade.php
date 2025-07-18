<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout Elegante</title>
    <script src="https://unpkg.com/htmx.org@1.9.2"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #34495e;
            --accent: #3498db;
            --light: #ecf0f1;
            --dark: #2c3e50;
            --text: #333333;
            --surface: #ffffff;
        }
        
        * {
            transition: all 0.3s ease;
            box-sizing: border-box;
        }
        
        body {
            margin: 0;
            padding: 20px;
            font-family: 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e7eb 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: var(--text);
        }
        
        .contenedor {
            background: var(--surface);
            border-radius: 20px;
            width: 100%;
            max-width: 820px;
            height: 94vh;
            overflow: hidden;
            position: relative;
            display: flex;
            flex-direction: column;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            animation: containerAppear 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
            transform: translateY(20px);
            opacity: 0;
        }
        
        @keyframes containerAppear {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        .contenedor::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: var(--accent);
            z-index: 10;
        }
        
        .content-wrapper {
            flex: 1;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }
        
        #formulario {
            flex: 1;
            background: var(--surface);
            border-radius: 16px;
            padding: 25px;
            overflow-y: auto;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            animation: fadeIn 0.5s 0.2s forwards;
            opacity: 0;
            position: relative;
        }
        
        @keyframes fadeIn {
            to { opacity: 1; }
        }
        
        /* Animación para elementos de mapa */
        .map-container {
            position: relative;
            height: 100%;
            width: 100%;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            animation: zoomIn 0.6s ease-out forwards;
            opacity: 0;
            transform: scale(0.95);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        @keyframes zoomIn {
            to { opacity: 1; transform: scale(1); }
        }
        
        /* Botones de navegación */
        .nav-buttons {
            display: flex;
            justify-content: center;
            padding: 15px 0;
            background: var(--surface);
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .nav-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--surface);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            margin: 0 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .nav-btn i {
            font-size: 20px;
            color: var(--text);
            transition: transform 0.3s ease;
        }
        
        .nav-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }
        
        .nav-btn:hover i {
            transform: scale(1.2);
            color: var(--accent);
        }
        
        .nav-btn.active {
            background: var(--accent);
        }
        
        .nav-btn.active i {
            color: white;
            transform: scale(1.1);
        }
        
        /* Encabezado */
        .app-header {
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--surface);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .app-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--dark);
            letter-spacing: 0.5px;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--light);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 18px;
            color: var(--accent);
            transition: all 0.3s ease;
        }
        
        .user-avatar:hover {
            transform: scale(1.05);
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }
        
        /* Responsividad */
        @media (max-width: 768px) {
            .contenedor {
                height: 100vh;
                border-radius: 0;
            }
            
            body {
                padding: 0;
            }
            
            .content-wrapper {
                padding: 15px;
            }
            
            #formulario {
                padding: 20px 15px;
            }
        }
        
        @media (max-width: 480px) {
            .nav-btn {
                width: 44px;
                height: 44px;
                margin: 0 5px;
            }
            
            .app-header {
                padding: 12px 15px;
            }
            
            .app-title {
                font-size: 1rem;
            }
        }
        
        /* Efectos de carga */
        .loading-bar {
            position: absolute;
            top: 0;
            left: 0;
            height: 3px;
            background: var(--accent);
            animation: loading 1.5s infinite;
            z-index: 1000;
            width: 30%;
        }
        
        @keyframes loading {
            0% { left: -30%; }
            100% { left: 100%; }
        }
        
        /* Texto animado */
        .animated-title {
            font-size: 1.5rem;
            font-weight: 600;
            text-align: center;
            margin: 20px 0;
            color: var(--dark);
            position: relative;
            display: inline-block;
        }
        
        .animated-title::after {
            content: "";
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--accent);
            animation: linePulse 2s infinite;
        }
        
        @keyframes linePulse {
            0%, 100% { width: 80px; }
            50% { width: 120px; }
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <!-- Barra de carga -->
        <div class="loading-bar"></div>
        
        <!-- Encabezado -->
        <div class="app-header">
            <div class="app-title">GeoApp</div>
            <div class="user-avatar">
                <button hx-get="{{ url('/perfil') }}" hx-target="#formulario" hx-swap="innerHTML" title="Perfil">
                    <i>👤</i>
                </button>
                
            </div>
        </div>
        <!-- Contenedor de contenido -->
        <div class="content-wrapper">
            <!-- Contenido dinámico de Laravel -->
            @yield('contenido')
        </div>
        

    </div>


    
    <script>
        function initializeSwiper() {
        document.querySelectorAll('.swiper').forEach(swiperEl => {
            if (swiperEl.swiper) swiperEl.swiper.destroy(true, true);

            new Swiper(swiperEl, {
            direction: 'horizontal',
            loop: true,
            pagination: {
                el: swiperEl.querySelector('.swiper-pagination'),
                clickable: true,
            },
            observer: true,
            observeParents: true,
            updateOnImagesReady: true,
            on: {
                // Cada vez que cambie el slide, dispara evento personalizado
                slideChange: function () {
                    const event = new CustomEvent('swiperSlideChanged', {
                        detail: {
                            activeIndex: this.activeIndex,
                            swiperElement: swiperEl
                        }
                    });
                    window.dispatchEvent(event);
                }
            }
            });
        });
        }

        document.addEventListener('DOMContentLoaded', () => setTimeout(initializeSwiper, 100));
        document.body.addEventListener('htmx:afterSwap', () => setTimeout(initializeSwiper, 50));
    </script>



    


    <script>
        function googleMapsLoaded() {
            console.log("Google Maps cargado. Esperando contenido HTMX...");
            // No hacemos nada aquí aún.
        }

        document.body.addEventListener('htmx:afterSwap', function () {
            // Ahora sí, cuando llega contenido dinámico, evaluamos qué mapa inicializar
            if (document.getElementById('mostrar_posicion_solo')) {
               
                initMostrarMapa();
            } else if (document.getElementById('seleccionar_punto_usuario')) {
                
                initSeleccionarMapa();
            } else if (document.getElementById('mapa-puntos')) {
              
                initMapaPuntosEncuentro();
            } else if (document.getElementById('mapaZonas')) {
               
                initMapaZonas();
            } else if (document.getElementById('mapa-poligono')) {
               
                initMapaZonaRiesgo();
            } else if (document.getElementById('mapa-poligono-lectura')) {
               
                initMapaZonaRiesgoLectura();
            } else {
                
            }
        });
    </script>





    <script src="{{ asset('js/mapas/mapa_mostrar_posicion_solo.js') }}"></script>
    <script src="{{ asset('js/mapas/mapa_mostrar_zona_segura.js') }}"></script>
    <script src="{{ asset('js/mapas/mapa_seleccionar_posicion_solo.js') }}"></script>
    <script src="{{ asset('js/mapas/mapa_swipe.js') }}"></script>
    <script src="{{ asset('js/mapas/mapa_puntos_encuentro.js') }}"></script>
    <script src="{{ asset('js/mapas/mapa_seleccionar_zona_riesgo.js') }}"></script>
    <script src="{{ asset('js/mapas/mapa_mostrar_zona_riesgo.js') }}"></script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBigiRgokOOjrShvA5Mi93R6kmhIYj8yPE&callback=googleMapsLoaded&loading=async"
        defer
    ></script>


</body>
</html>




