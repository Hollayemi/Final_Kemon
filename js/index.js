let geocode = {
    reverseGeocode: function(latitude,longitude){
var apikey = 'bdc19c9b2a23467390028dd587dda962';


var api_url = 'https://api.opencagedata.com/geocode/v1/json'

var request_url = api_url
    + '?'
    + 'key=' + apikey
    + '&q=' + encodeURIComponent(latitude + ',' + longitude)
    + '&pretty=1'
    + '&no_annotations=1';

// see full list of required and optional parameters:
// https://opencagedata.com/api#forward

var request = new XMLHttpRequest();
request.open('GET', request_url, true);

request.onload = function() {
    // see full list of possible response codes:
    // https://opencagedata.com/api#codes

    if (request.status === 200){ 
        // Success!
        var data = JSON.parse(request.responseText);
        // console.log(data.results[0].components); // print the location


        // if(data.results[0].components.village != 'undefined'){
        //   document.getElementById('guessCity').value = data.results[0].components.city;
        // }else if(data.results[0].components.city != 'undefined'){
        //   document.getElementById('guessCity').value = data.results[0].components.city;
        // }
        // else{
        // }


        // if(data.results[0].components.state != "undefined"){
        //   document.getElementById('guessState').value = data.results[0].components.state;
        // }

        // if(data.results[0].components.road != 'undefined'){
        //     document.getElementById('guessRoad').value = data.results[0].components.road;
        // }

        // if(data.results[0].components.suburb){
        //     document.getElementById('guessSuburb').value = data.results[0].components.suburb;
        // }
    
    } else if (request.status <= 500){ 
    // We reached our target server, but it returned an error
                        
    console.log("unable to geocode! Response code: " + request.status);
    var data = JSON.parse(request.responseText);
    console.log('error msg: ' + data.status.message);
    } else {
      console.log("server error");
    }
};

request.onerror = function() {
    console.log("unable to connect to server");        
};

request.send();  
},
getLocation: function success(data){
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(success, console.error);
    }
    // console.log("Latitude: " + data.coords.latitude)
    // console.log("Longitude: " + data.coords.longitude)

    document.getElementById('btnLat').value = data.coords.latitude;
    document.getElementById('btnLong').value =  data.coords.longitude;
    var getAllLongitude = (document.getElementsByClassName("catLong"))
    var getAllLatitude = (document.getElementsByClassName("catLati"))
    for(var i = 0; i<getAllLatitude.length; i++){
        getAllLatitude[i].value  =  data.coords.latitude;
        getAllLongitude[i].value =  data.coords.longitude;
    }
    geocode.reverseGeocode(data.coords.latitude,data.coords.longitude)
} 
};
geocode.getLocation();
var getAllLongitude = (document.getElementsByClassName("catLong"))
    var getAllLatitude = (document.getElementsByClassName("catLati"))
    for(var i = 0; i<getAllLatitude.length; i++){
        getAllLatitude[i].value="kem"
        getAllLongitude[i].value = "okeigbo"
    }   



// for top bar and bottom bar
var prevScrollpos = window.pageYOffset;
    window.onscroll= function(){
        var currentScrollPos = window.pageYOffset;
        if(prevScrollpos > currentScrollPos && prevScrollpos > 50){
            document.getElementById("scrolledHeader").style.top = "0";
            document.getElementById("scrolledFooter").style.bottom = "-61px";
        }else{
            
            document.getElementById("scrolledFooter").style.bottom = "0px";
            document.getElementById("scrolledHeader").style.top = "-75px";
        }
        prevScrollpos=currentScrollPos;

        document.querySelector(".relativeOnStart").classList.toggle("fixedOnScroll");
    }



    // for scrolling

    var hol = -70;
    document.querySelector('.righrArr').addEventListener('click', function(){
      document.querySelector('.inif').scrollLeft +=70
      hol +=70
      document.querySelector('.leftArr').style.opacity = "1"
      document.querySelector('.leftArr').style.visibility = "visible"
      if(document.querySelector('.inif').scrollLeft > 0){
          document.querySelector('.leftArr').style.opacity = "1"
      }
      if(hol > document.querySelector('.inif').scrollLeft){
        document.querySelector('.righrArr').style.opacity = "0"
        document.querySelector('.righrArr').style.visibility = "hidden"
      }
    })




    document.querySelector('.leftArr').addEventListener('click', function(){
      document.querySelector('.inif').scrollLeft -=70
      hol -=70
      document.querySelector('.righrArr').style.opacity = "1"
      document.querySelector('.righrArr').style.visibility = "visible"
      if(document.querySelector('.inif').scrollLeft == 0){
          document.querySelector('.leftArr').style.opacity = "0"
          document.querySelector('.leftArr').style.visibility = "hidden"
      }
    })
