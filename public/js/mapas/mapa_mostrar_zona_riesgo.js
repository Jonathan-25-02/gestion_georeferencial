let mapaZonaLectura;

function initMapaZonaRiesgoLectura() {
    const div = document.getElementById("mapa-poligono-lectura");

    // Obtener y parsear datos del atributo data-puntos
    const datosRaw = div.getAttribute('data-puntos');
    console.log('Raw data-puntos JSON:', datosRaw);

    const datos = JSON.parse(datosRaw);
    console.log('Datos parseados en JS:', datos);

    if (!Array.isArray(datos) || datos.length === 0) {
        alert("No hay zonas de riesgo para mostrar.");
        return;
    }

    // Coordenadas del primer punto para centrar el mapa
    let centroMapa = new google.maps.LatLng(-0.9374805, -78.6161327);

    try {
        const primeraZonaCoords = JSON.parse(datos[0].coordenadas);
        if (primeraZonaCoords.length > 0) {
            centroMapa = new google.maps.LatLng(parseFloat(primeraZonaCoords[0][0]), parseFloat(primeraZonaCoords[0][1]));
        }
    } catch (e) {
        console.warn("No se pudo usar coordenadas de la primera zona, usando valor por defecto.");
    }

    // Crear el mapa centrado en la primera coordenada válida
    mapaZonaLectura = new google.maps.Map(div, {
        zoom: 15,
        center: centroMapa,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    // Recorrer cada zona y dibujar su polígono
    datos.forEach((zona, index) => {
        if (!zona.coordenadas) {
            console.warn(`Zona con id ${zona.id} no tiene coordenadas.`);
            return;
        }

        try {
            const coordsRaw = JSON.parse(zona.coordenadas);
            const coordenadasParseadas = coordsRaw.map(coord => {
                return new google.maps.LatLng(parseFloat(coord[0]), parseFloat(coord[1]));
            });

            console.log(`Zona ${zona.nombre} (${zona.id}) - Coordenadas:`, coordenadasParseadas);

            // Dibujar el polígono
            const poligono = new google.maps.Polygon({
                paths: coordenadasParseadas,
                strokeColor: "#FF0000",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: "#FFA07A",
                fillOpacity: 0.35
            });
            poligono.setMap(mapaZonaLectura);


        } catch (error) {
            console.error(`Error al procesar zona con id ${zona.id}:`, error);
        }
    });
}

// Exponer para Google Maps API callback
window.initMapaZonaRiesgoLectura = initMapaZonaRiesgoLectura;
