function initMostrarMapa() {
    const latInput = document.getElementById("latitud");
    const lngInput = document.getElementById("longitud");

    const lat = latInput ? parseFloat(latInput.value) : -0.9374805;
    const lng = lngInput ? parseFloat(lngInput.value) : -78.6161327;

    const latlng = new google.maps.LatLng(lat, lng);

    const mapa = new google.maps.Map(document.getElementById('mostrar_posicion_solo'), {
        center: latlng,
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        
    });

    new google.maps.Marker({
        position: latlng,
        map: mapa,
        title: "Ubicación del usuario",
        draggable: false
    });

    
}
window.initMostrarMapa = initMostrarMapa;