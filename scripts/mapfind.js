//window.onload=function(){loadMap()};

function viewCoord(long, latt){
    // if(document.getElementById("ctrlMap").innerHTML.length != 1){
    //     let mapOsm = L.DomUtil.get("ctrlMap");
    //     mapOsm.panTo(new L.latLng([latt, long]), 16);
    //     var marker = L.marker([latt,long]).addTo(mapOsm);
    // }else{
        let mapOsm = L.map("ctrlMap").setView([latt, long], 16);

        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox.streets',
            accessToken: 'pk.eyJ1IjoiYWdpbmppIiwiYSI6ImNqeXJkdDhmMTAzMXEzb3N5NHJiZzBpbHoifQ.Jg03Lyf2aw8n3i-XFjN2vQ'
        }).addTo(mapOsm);
        var marker = L.marker([latt,long]).addTo(mapOsm);
    // }
}
