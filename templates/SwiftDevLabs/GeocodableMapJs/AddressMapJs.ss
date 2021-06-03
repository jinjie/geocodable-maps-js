<div id="geocodable-map-{$ID}" style="width: {$Width}; height: {$Height};">
    
</div>
<script>
function initMap{$ID}() {
    const marker{$ID} = { lat: {$Lat}, lng: {$Lng} };
    const map{$ID} = new google.maps.Map(document.getElementById("geocodable-map-{$ID}"), {
        zoom: {$Zoom},
        center: marker{$ID},
    });
    const marker = new google.maps.Marker({
        position: marker{$ID},
        map: map{$ID},
    });
}
</script>