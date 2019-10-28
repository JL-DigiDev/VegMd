window.onload=function(){getMap()};

function getMap(){
    let mapOsm = L.map("minimap").setView([50.85, 4.36], 8);

    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1IjoiYWdpbmppIiwiYSI6ImNqeXJkdDhmMTAzMXEzb3N5NHJiZzBpbHoifQ.Jg03Lyf2aw8n3i-XFjN2vQ'
    }).addTo(mapOsm);

    var popup = L.popup();

    function onMapClick(e){
        document.getElementById("latti").value = e.latlng["lat"];
        document.getElementById("longi").value = e.latlng["lng"];
        popup
            .setLatLng(e.latlng)
            .setContent("longitude ["+e.latlng["lng"]+"] et lattitude ["+e.latlng["lat"]+"] complétées")
            .openOn(mapOsm);


    }
    mapOsm.on("click",onMapClick);
}
