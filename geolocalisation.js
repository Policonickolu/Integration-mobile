// GEOLOCALISATION
    
    function adresseLatLng() {
            var lat = document.getElementById("latitude").value;
            var lng = document.getElementById("longitude").value;
            var latlng = new google.maps.LatLng(lat, lng);
            geocoder.geocode({'latLng': latlng}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                            if (results[0]) {
                                    map.setZoom(13);
                                    marker = new google.maps.Marker({
                                            position: latlng,
                                            map: map
                                    });
                                    $("#geoadr").val(results[0].formatted_address);
                                    
                                    
                                    map.panTo(latlng);
                            }
                    } else {
                            alert("Adresse introuvable");
                    }
            });
    }