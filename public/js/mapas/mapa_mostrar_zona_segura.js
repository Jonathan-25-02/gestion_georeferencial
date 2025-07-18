function initMapaZonas() {
    const mapaDiv = document.getElementById("mapaZonas");
    if (!mapaDiv) return;

    let zonas = [];

    try {
        const data = mapaDiv.dataset.zonas;
        zonas = JSON.parse(data);
    } catch (error) {
        console.error("Error al parsear zonas seguras:", error);
        return;
    }

    if (zonas.length === 0) {
        console.warn("No hay zonas seguras para mostrar.");
        return;
    }

    const primerZona = zonas[0];
    const centro = { lat: parseFloat(primerZona.latitud), lng: parseFloat(primerZona.longitud) };

    const mapa = new google.maps.Map(mapaDiv, {
        zoom: 14,
        center: centro,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    zonas.forEach(zona => {
        const posicion = {
            lat: parseFloat(zona.latitud),
            lng: parseFloat(zona.longitud)
        };

        // Marcador
        const marcador = new google.maps.Marker({
            position: posicion,
            map: mapa,
            title: zona.nombre
        });

        // Círculo
        new google.maps.Circle({
            strokeColor: "green",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: "#00ff0055",
            fillOpacity: 0.4,
            map: mapa,
            center: posicion,
            radius: parseFloat(zona.radio_metros) || 50
        });

        // InfoWindow
        const contenido = `
            <strong>${zona.nombre}</strong><br>
            Tipo: ${zona.tipo}<br>
            Descripción: ${zona.descripcion}<br>
            Radio: ${zona.radio_metros} m
        `;
        const info = new google.maps.InfoWindow({ content: contenido });

        marcador.addListener("click", () => info.open(mapa, marcador));
    });
}

window.initMapaZonas = initMapaZonas;
