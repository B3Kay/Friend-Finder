<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$lat;
$lng;

if (isset($_GET['lat']) &&
        isset($_GET['lng'])) {

    $lat = $_GET['lat'];
    $lng = $_GET['lng'];
}
?>
<script>
    function initMap() {
        var uluru = {lat: <?php echo $lat; ?>, lng: <?php echo $lng; ?>};
        console.log("lat: <?php echo $lat; ?>");
        console.log("lng: <?php echo $lng; ?>");
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 18,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAamjs7CDkWnXujggAm5z8Kul-zxpEjYt4&callback=initMap">
</script>