function initMap() {
    var exists_latLng = $("#map_latLon").val();
    exists_latLng = exists_latLng.split(",");
    var lat = parseFloat(exists_latLng[0]).toFixed(2);
    var lng = parseFloat(exists_latLng[1]).toFixed(2);
    var latLon = { lat: parseFloat(lat), lng: parseFloat(lng) };

    // The map, centered at latLon
    var map = new google.maps.Map(
        document.getElementById('map'), { zoom: 13, center: latLon, scrollwheel: false, });
    // The marker, positioned at latLon
    var marker = new google.maps.Marker({
        position: latLon,
        map: map,
        draggable: true,
    });

    google.maps.event.addListener(marker, 'drag', function (event) {
        $("#map_latLon").val(event.latLng.lat() + "," + event.latLng.lng());
    });

    google.maps.event.addListener(marker, 'dragend', function (event) {
        $("#map_latLon").val(event.latLng.lat() + "," + event.latLng.lng());
    });
}
