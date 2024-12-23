<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alcantarillado Costa Rica</title>
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="icon" href="./assets/img/aya_logo.ico" type="image/x-icon">
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARpXhQae4eZzk-kVDuDHfoedJ9F2CH550&callback=initMap" async defer></script>
    </head>
    
    <body>
    

    <?php include './assets/componentes/header.php' ?>

    <section class="Gmap-container">
    <div class="content" style="width: 1000px;">
        <span class="blur"></span>
        <span class="blur"></span>
        <h1>Mapa del Area</h1>
        <!--<iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3930.0089124881297!2d-84.03758522430299!3d9.933215174178976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0e3f47ea4ff37%3A0x7a7818a6a9e5c90c!2sFidelitas%20University%20Campus%20San%20Pedro!5e0!3m2!1sen!2scr!4v1727333026357!5m2!1sen!2scr"
            class="GMap-iframe" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>-->
            <div id="map" style="height: 500px; width: 1000px"></div>
        <h4>Mapa general de su area</h4>
        <span class="blur"></span>
    </div>
</section>


<script>
    function initMap() {
       
        const map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 9.933215, lng: -84.037585 }, 
            zoom: 13
        });

        
        const locations = [
            { lat: 9.9333, lng: -84.0833, title: "Ubicación 1" }, 
            { lat: 10.0167, lng: -84.2167, title: "Ubicación 2" },  
            { lat: 10.0025, lng: -84.1167, title: "Ubicación 3" }   
        ];

        
        locations.forEach(function(location) {
            new google.maps.Marker({
                position: { lat: location.lat, lng: location.lng },
                map: map,
                title: location.title
            });
        });
    }
</script>

<?php include './assets/componentes/footer.php' ?>


    <div class="copyright">
        Copyright © 2024 Alcantarillado Costa Rica. All Rights Reserved.
    </div>
</body>
</html>

