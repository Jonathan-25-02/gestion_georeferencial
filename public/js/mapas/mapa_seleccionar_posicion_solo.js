
function initSeleccionarMapa() {
    const latInput = document.getElementById("latitud");
    const lngInput = document.getElementById("longitud");

    const lat = latInput ? parseFloat(latInput.value) : -0.9374805;
    const lng = lngInput ? parseFloat(lngInput.value) : -78.6161327;

    const latlng = new google.maps.LatLng(lat, lng);

    const mapa = new google.maps.Map(document.getElementById('seleccionar_punto_usuario'), {
        center: latlng,
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var marcador = new google.maps.Marker({
        position: latlng,
        map: mapa,
        title: "Seleccione una posicion",
        draggable: true
    });

    marcador.addListener('dragend', function () {
        var lat = this.getPosition().lat();
        var lng = this.getPosition().lng();
        document.getElementById("latitud").value = lat;
        document.getElementById("longitud").value = lng;
    });

    
}
window.initSeleccionarMapa = initSeleccionarMapa;