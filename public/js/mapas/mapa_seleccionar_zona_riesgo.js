let mapaZona, poligonoZona;

function initMapaZonaRiesgo() {
    const centro = new google.maps.LatLng(-0.9374805, -78.6161327);

    mapaZona = new google.maps.Map(document.getElementById("mapa-poligono"), {
        zoom: 15,
        center: centro,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    for (let i = 1; i <= 4; i++) {
        const mapaDiv = document.getElementById("mapa" + i);
        if (!mapaDiv) continue;

        const mapa = new google.maps.Map(mapaDiv, {
            center: centro,
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        const marcador = new google.maps.Marker({
            position: centro,
            map: mapa,
            title: "Seleccione la coordenada " + i,
            draggable: true
        });

        marcador.addListener('dragend', function () {
            document.getElementById("latitud" + i).value = this.getPosition().lat();
            document.getElementById("longitud" + i).value = this.getPosition().lng();
        });
    }
}

function graficarZonaRiesgo() {
    const coordenadas = [];

    for (let i = 1; i <= 4; i++) {
        const lat = parseFloat(document.getElementById("latitud" + i).value);
        const lng = parseFloat(document.getElementById("longitud" + i).value);

        if (!isNaN(lat) && !isNaN(lng)) {
            coordenadas.push(new google.maps.LatLng(lat, lng));
        }
    }

    if (coordenadas.length === 4) {
        if (poligonoZona) {
            poligonoZona.setMap(null);
        }

        poligonoZona = new google.maps.Polygon({
            paths: coordenadas,
            strokeColor: "#FF0000",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: "#FFA07A",
            fillOpacity: 0.35
        });

        poligonoZona.setMap(mapaZona);
    } else {
        alert("Debes seleccionar las 4 coordenadas para graficar la zona.");
    }
}

function validarZonaRiesgo() {
    const campos = [
        'latitud1', 'longitud1',
        'latitud2', 'longitud2',
        'latitud3', 'longitud3',
        'latitud4', 'longitud4'
    ];

    for (let campo of campos) {
        if (!document.getElementById(campo).value) {
            alert("Faltan coordenadas. Por favor, selecciona las 4 antes de guardar.");
            return false;
        }
    }

    return true;
}

// Expone la función para el callback de Google Maps
window.initMapaZonaRiesgo = initMapaZonaRiesgo;
