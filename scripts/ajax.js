window.onload=function(){loadAjax()};

function loadAjax(tol,spe){
    let mapDiv = document.getElementById("map").innerHTML;
    let url = "api/index.php/";

    if(tol=="vgr"){
        url+="tol/2/";
    }else if(tol=="vgl"){
        url+="tol/1/";
    }
    if(spe){
        url+="spe/"+spe+"/";
    }
    console.log(url);

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            function jx(myJson){};
            resp = JSON.parse(xmlhttp.responseText);
            getMd(resp);
            getMap(resp);
        }else{
            console.log("Err");
            console.log("State: "+this.readyState);
            console.log("Status: "+this.status)
        }
    };
    xmlhttp.open("GET",url, true);
    xmlhttp.send();
};

function getMd(resp){
    document.getElementById("mdLoad").innerHTML = "";

    let sect='<section class="col-md-12">';
    let eSect='</section>';
    let title='<h2 class="text-success border-bottom border-success">';
    let eTitle='</h2>';

    for(let i in resp){
        selPin = resp[i].Tol+resp[i].Spe;

        switch(selPin){
            case "11":
                spe = "Généraliste";
                tol = "Vegan Friendly";
                break;
            case "12":
                spe = "Pédiatre";
                tol = "Vegan Friendly";
                break;
            case "13":
                spe = "Gynécologue";
                tol = "Vegan Friendly";
                break;
            case "14":
                spe = "Psychiatre";
                tol = "Vegan Friendly";
                break;
            case "15":
                spe = "Psychologue";
                tol = "Vegan Friendly";
                break;
            case "16":
                spe = "Diététicien";
                tol = "Vegan Friendly";
                break;
            case "21":
                spe = "Généraliste";
                tol = "Vegetarian Friendly";
                break;
            case "22":
                spe = "Pédiatre";
                tol = "Vegetarian Friendly";
                break;
            case "23":
                spe = "Gynécologue";
                tol = "Vegetarian Friendly";
                break;
            case "24":
                spe = "Psychiatre";
                tol = "Vegetarian Friendly";
                break;
            case "25":
                spe = "Psychologue";
                tol = "Vegetarian Friendly";
                break;
            case "26":
                spe = "Diététicien";
                tol = "Vegetarian Friendly";
                break;
        }

        let fName = resp[i].LastName+" "+resp[i].FirstName;
        let fAdr = "<br>[ "+spe+" "+tol+" ]<br>"+resp[i].Street+" "+resp[i].House+"<br>"+resp[i].Zip+" "+resp[i].City;
        let fCont = "<br><br>Tel: "+resp[i].Phone+"<br>Web: <a href='http://"+resp[i].Web+"' target='_blank'>"+resp[i].Web+"</a>";

        let card = sect+title+fName+eTitle+fAdr+fCont+eSect;
        document.getElementById("mdLoad").innerHTML += card;
    }
}

function getMap(resp){
    try{
        mapOsm = L.map("map").setView([50.38, 4.40], 7);
        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox.streets',
            accessToken: 'pk.eyJ1IjoiYWdpbmppIiwiYSI6ImNqeXJkdDhmMTAzMXEzb3N5NHJiZzBpbHoifQ.Jg03Lyf2aw8n3i-XFjN2vQ'
        }).addTo(mapOsm);
    }catch(e){
        console.log("MAP ERROR:"+e);
    }finally{
        try{
            var pin = L.Icon.extend({
                option:{
                    iconSize:       [64,64],
                    iconAnchor:     [32,0],
                    popupAnchor:    [-3,-76]
                }
            });

            var pinMdVgl = new pin({iconUrl: 'design/Pin-medic-vgl.svg',}),
                pinMdVgr = new pin({iconUrl: 'design/Pin-medic-vgr.svg',}),
                pinGyVgl = new pin({iconUrl: 'design/Pin-gynec-vgl.svg',}),
                pinGyVgr = new pin({iconUrl: 'design/Pin-gynec-vgr.svg',}),
                pinPeVgl = new pin({iconUrl: 'design/Pin-pedia-vgl.svg',}),
                pinPeVgr = new pin({iconUrl: 'design/Pin-pedia-vgr.svg',}),
                pinPoVgl = new pin({iconUrl: 'design/Pin-psyco-vgl.svg',}),
                pinPoVgr = new pin({iconUrl: 'design/Pin-psyco-vgr.svg',}),
                pinPaVgl = new pin({iconUrl: 'design/Pin-psyca-vgl.svg',}),
                pinPaVgr = new pin({iconUrl: 'design/Pin-psyca-vgr.svg',}),
                pinDtVgl = new pin({iconUrl: 'design/Pin-diet-vgl.svg',}),
                pinDtVgr = new pin({iconUrl: 'design/Pin-diet-vgr.svg',});

            var popup = L.popup();

            //function onMapClick(e){

                // popup
                //     .setLatLng(e.latlng)
                //     .setContent("Click @ "+e.latlng.toString())
                //     .openOn(mapOsm);

                    cLat = 0//e.latlng["lat"];
                    cLng = 0//e.latlng["lng"];

                    placeMd(mapOsm, resp,cLat,cLng,pinMdVgl,pinMdVgr,pinGyVgl,pinGyVgr,pinPeVgl,pinPeVgr,pinPaVgl,pinPaVgr,pinPoVgl,pinPoVgr,pinDtVgl,pinDtVgr);
            //}
            //mapOsm.on("click",onMapClick);
        }catch(e){
            console.log("PIN ERROR:"+e);
        }
    }
}

function placeMd(mapOsm, resp,cLat,cLng,pinMdVgl,pinMdVgr,pinGyVgl,pinGyVgr,pinPeVgl,pinPeVgr,pinPaVgl,pinPaVgr,pinPoVgl,pinPoVgr,pinDtVgl,pinDtVgr){
    $(document).ready(function(){
        var popCard, usePin, selPin, spe, tol;
        if(typeof lrPin !== 'undefined'){
            mapOsm.removeLayer(lrPin);
        }
        lrPin = new L.LayerGroup();

        for(let i in resp){
            selPin = resp[i].Tol+resp[i].Spe;

            switch(selPin){
                case "11":
                    usePin = pinMdVgl;
                    spe = "Généraliste";
                    tol = "Vegan Friendly";
                    break;
                case "12":
                    usePin = pinPeVgl;
                    spe = "Pédiatre";
                    tol = "Vegan Friendly";
                    break;
                case "13":
                    usePin = pinGyVgl;
                    spe = "Gynécologue";
                    tol = "Vegan Friendly";
                    break;
                case "14":
                    usePin = pinPaVgl;
                    spe = "Psychiatre";
                    tol = "Vegan Friendly";
                    break;
                case "15":
                    usePin = pinPoVgl;
                    spe = "Psychologue";
                    tol = "Vegan Friendly";
                    break;
                case "16":
                    usePin = pinDtVgl;
                    spe = "Diététicien";
                    tol = "Vegan Friendly";
                    break;
                case "21":
                    usePin = pinMdVgr;
                    spe = "Généraliste";
                    tol = "Vegetarian Friendly";
                    break;
                case "22":
                    usePin = pinPeVgr;
                    spe = "Pédiatre";
                    tol = "Vegetarian Friendly";
                    break;
                case "23":
                    usePin = pinGyVgr;
                    spe = "Gynécologue";
                    tol = "Vegetarian Friendly";
                    break;
                case "24":
                    usePin = pinPaVgr;
                    spe = "Psychiatre";
                    tol = "Vegetarian Friendly";
                    break;
                case "25":
                    usePin = pinPoVgr;
                    spe = "Psychologue";
                    tol = "Vegetarian Friendly";
                    break;
                case "26":
                    usePin = pinDtVgr;
                    spe = "Diététicien";
                    tol = "Vegetarian Friendly";
                    break;
            }

            let fName = resp[i].LastName+" "+resp[i].FirstName;
            let fAdr = "<br>[ "+spe+" "+tol+" ]<br>"+resp[i].Street+" "+resp[i].House+"<br>"+resp[i].Zip+" "+resp[i].City;
            let fCont = "<br><br>Tel: "+resp[i].Phone+"<br>Web: <a href='http://"+resp[i].Web+"' target='_blank'>"+resp[i].Web+"</a>";

            var marker = L.marker([parseFloat(resp[i].Latt), parseFloat(resp[i].Long)],{icon: usePin}).addTo(lrPin);
            marker.bindPopup(fName+fAdr+fCont).openPopup();
        }
        mapOsm.addLayer(lrPin);
    });
}

function selectTol(tol){
    let change = document.getElementsByClassName("mdType");
    let button = document.getElementById("selectTol");

    let nwClass;

    if(tol=="vgr"){
        // button.innerHTML="Select Vegan Only";
        // button.className="btn btn-success";
        button.setAttribute("onclick","selectTol('vgl')");
    }else if(tol=="vgl"){
        // button.innerHTML="Select Vegetarian and Vegan";
        // button.className="btn btn-warning";
        button.setAttribute("onclick","selectTol('vgr')");
    }

    for(let i=0;i<change.length;i++){
        if(i!=0){
            spe=","+i;
        }else{
            spe="";
            loadAjax(tol,i)
        }
        change[i].setAttribute("onclick","loadAjax('"+tol+"'"+spe+")");
    }
}
