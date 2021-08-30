
setInterval(function(){ 
  plusSlides(1)
}, 5000);

// slider



var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
      slides[i].style.marginTop = "-5px";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" activeDot", "");
  }
  slides[slideIndex-1].style.display = "flex";  
  dots[slideIndex-1].className += " activeDot";
}

//===Fake phone===============---------------------------------

           
            










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
            console.log(data.results[0].components); // print the location


            if(data.results[0].components.village != 'undefined'){
              document.getElementById('guessCity').value = data.results[0].components.city;
            }else if(data.results[0].components.city != 'undefined'){
              document.getElementById('guessCity').value = data.results[0].components.city;
            }
            else{
            }


            if(data.results[0].components.state != "undefined"){
              document.getElementById('guessState').value = data.results[0].components.state;
            }

            if(data.results[0].components.road != 'undefined'){
                document.getElementById('guessRoad').value = data.results[0].components.road;
            }

            if(data.results[0].components.suburb){
                document.getElementById('guessSuburb').value = data.results[0].components.suburb;
            }
        
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
        console.log("Latitude: " + data.coords.latitude)
        console.log("Latitude: " + data.coords.longitude)
        document.getElementById('latitude').value = data.coords.latitude
        document.getElementById('longitude').value = data.coords.longitude
        geocode.reverseGeocode(data.coords.latitude,data.coords.longitude)
    } 
};

geocode.getLocation();

          
// agn pop up


          