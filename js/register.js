      // =======================arrows===================================          
          const dash2 = document.querySelector('.dash2');
          const toNext1 = document.querySelector('.busz_details');
          const numbb1 = document.querySelector('.numbb1');
          const toNextBtn1 = document.querySelectorAll('.toNext1 .toNextsec');
          const toNextBtnsec1 = document.querySelector('.toNextsec');
          document.querySelector('.toNext1').addEventListener('click', function(){
             toNext1.style.marginLeft = "-20%"
             dash2.style.backgroundColor = "green"
             numbb1.style.backgroundColor = "green"
             numbb1.style.color = "#fff"
             numbb1.style.borderColor = "#00cc00"
             numbb1.style.scale = ".2"
             numbb1.innerHTML = "&#10003;"
   
           })
           const dash3 = document.querySelector('.dash3');
          const numbb2 = document.querySelector('.numbb2');
          const toNext2 = document.querySelector('.busz_loc_Add');
          const toNextBtn2 = document.querySelector('.toNext2');
          const toNextBtnsec2 = document.querySelector('.toNextsec2');
          document.querySelector('.toNext2').addEventListener('click', function(){
             numbb2.innerHTML = "&#10003;"
             dash3.style.backgroundColor = "green"
             numbb2.style.backgroundColor = "green"
             numbb2.style.color = "#fff"
             numbb2.style.borderColor = "#00cc00"
             numbb2.style.scale = "1.2"
             toNext2.style.marginLeft = "-20%"
           })
   
   
          const dash4 = document.querySelector('.dash4');
          const numbb3 = document.querySelector('.numbb3');
          const newtoNext2 = document.querySelector('.busz_Category');
          const newtoNextBtn2 = document.querySelector('.newtoNext2');
         //  const toNextBtnsec2 = document.querySelector('.toNextsec2');
          document.querySelector('.newtoNext2').addEventListener('click', function(){
             numbb3.innerHTML = "&#10003;"
             dash4.style.backgroundColor = "green"
             numbb3.style.backgroundColor = "green"
             numbb3.style.color = "#fff"
             numbb3.style.borderColor = "#00cc00"
             numbb3.style.scale = ".2"
             newtoNext2.style.marginLeft = "-20%"
           })
          
           const dash5 = document.querySelector('.dash5');
           const numbb4 = document.querySelector('.numbb4');
         const toNext3 = document.querySelector('.soc_med');
          const toNextBtn3 = document.querySelector('.toNext3');
          const toNextBtnsec3 = document.querySelector('.toNextsec3');
          document.querySelector('.toNext3').addEventListener('click', function(){
             numbb4.innerHTML = "&#10003;"
             toNext3.style.marginLeft = "-19%"
             numbb4.style.backgroundColor = "green"
             dash5.style.backgroundColor = "green"
             numbb4.style.color = "#fff"
             numbb4.style.borderColor = "#00cc00"
             numbb4.style.scale = ".2"
           })
         // ====================================------------back arrows-------------------==========================
           const das2 = document.querySelector('.dash2');
           const numb1 = document.querySelector('.numbb1');
          const toBack2 = document.querySelector('.busz_loc_Add');
          const toBackBtn2 = document.querySelector('.toBack2');
     
          document.querySelector('.toBack2').addEventListener('click', function(){
             toNext1.style.marginLeft = "0%"
             numb1.innerHTML = "1"
             numb1.style.backgroundColor = "transparent"
             das2.style.backgroundColor = "red"
             numb1.style.color = "black"
             numb1.style.borderColor = "red"
             numb1.style.scale = "2"
           })
   
   
           const das3 = document.querySelector('.dash3');
           const numb2 = document.querySelector('.numbb2');
          const newtoBack2 = document.querySelector('.busz_Category');
          const newtoBackBtn2 = document.querySelector('.newtoBack2');
         
          document.querySelector('.newtoBack2').addEventListener('click', function(){
             toNext2.style.marginLeft = "0%"
             numb2.innerHTML = "2"
             numb2.style.backgroundColor = "transparent"
             das3.style.backgroundColor = "red"
             numb2.style.color = "black"
             numb2.style.borderColor = "red"
             numb2.style.scale = "2"
           })
   
   
          const das4 = document.querySelector('.dash4');
          const numb3 = document.querySelector('.numbb3');
          const toBack3 = document.querySelector('.soc_med');
          const toBackBtn3 = document.querySelector('.toBack3');
          document.querySelector('.toBack3').addEventListener('click', function(){
             newtoNext2.style.marginLeft = "0%"
             numb3.innerHTML = "3"
             numb3.style.backgroundColor = "transparent"
             das4.style.backgroundColor = "red"
             numb3.style.color = "black"
             numb3.style.borderColor = "red"
             numb3.style.scale = "1"
           })
   
   
          const das5 = document.querySelector('.dash5');
          const numb4 = document.querySelector('.numbb4');
          const toBack4 = document.querySelector('.soc_med');
          const toBackBtn4 = document.querySelector('.toBack4');
          document.querySelector('.toBack4').addEventListener('click', function(){
             toNext3.style.marginLeft = "0%"
             numb4.innerHTML = "4"
             numb4.style.backgroundColor = "transparent"
             das5.style.backgroundColor = "red"
             numb4.style.color = "black"
             numb4.style.borderColor = "red"
             numb4.style.scale = "1.5"
           })
   
   
   
   
           var Openhours = document.querySelector('.Openhours');
           document.querySelector('.checkHour').addEventListener('click', function(){
             if(this.checked == true){
               document.querySelector('.Openhours').classList.toggle('OpenhoursSec')
               document.querySelector('.not24').innerHTML="24 hours";
           }else{
             document.querySelector('.Openhours').classList.toggle('OpenhoursSec')
             document.querySelector('.not24').innerHTML="not 24 hours";
           }
           })













        //    =--------------------------------==================Fake phone===============---------------------------------

           
            










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


          