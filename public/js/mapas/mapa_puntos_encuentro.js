function initMapaPuntosEncuentro() {
    const mapaDiv = document.getElementById('mapa-puntos');
    if (!mapaDiv) return;

    let puntosEncuentro = [];

    try {
        const data = mapaDiv.dataset.puntos;
        puntosEncuentro = JSON.parse(data);
    } catch (error) {
        console.error("Error al parsear puntos de encuentro:", error);
        return;
    }

    if (puntosEncuentro.length === 0) {
        console.warn("No hay puntos de encuentro para mostrar.");
        return;
    }

    // Centrar el mapa en el primer punto
    const primerPunto = puntosEncuentro[0];
    const centroMapa = new google.maps.LatLng(primerPunto.latitud, primerPunto.longitud);

    const mapa = new google.maps.Map(mapaDiv, {
        center: centroMapa,
        zoom: 13,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    // Agregar marcadores
    puntosEncuentro.forEach(punto => {
        const posicion = new google.maps.LatLng(punto.latitud, punto.longitud);
        new google.maps.Marker({
            position: posicion,
            map: mapa,
            title: punto.nombre,
            // icon: 'url-icono' // opcional
        });
    });
}

window.initMapaPuntosEncuentro = initMapaPuntosEncuentro;
