function getLocation() {
    if (navigator.geolocation) {
      console.log('opo')
      navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
      x.innerHTML = "Geolocation is not supported by this browser.";
    }
  }
  
  function showPosition(position) {
    console.log( "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude)
    // x.innerHTML = "Latitude: " + position.coords.latitude + 
    // "<br>Longitude: " + position.coords.longitude;
  }
  

  const successfulLookUp  = (position) => {
      const {latitude, longitude} = position.coords;
      fetch('https://api.opencagedata.com/geocode/v1/json?q=${latitude}+${longitude}&key=bdc19c9b2a23467390028dd587dda962')
      .then(response => response.json())
      .then(console.log);
  }
  
  navigator.geolocation.getCurrentPosition(successfulLookUp, console.log);

  
