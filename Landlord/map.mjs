

function setCookie(name, value, daysToExpire) {
    var cookieValue = name + "=" + encodeURIComponent(value);
  
    if (daysToExpire) {
      var expirationDate = new Date();
      expirationDate.setTime(expirationDate.getTime() + (daysToExpire * 24 * 60 * 60 * 1000));
      cookieValue += "; expires=" + expirationDate.toUTCString();
    }
  
    document.cookie = cookieValue + "; path=/";
  }






function sendToServer(longitude,latitude){


setCookie("longitude" , `${longitude}`);
setCookie("latitude" , `${latitude}`);






}


      


    // Initialize the map
    mapboxgl.accessToken = '';  //mapbox gl library access token goes here
    const map = new mapboxgl.Map({
      container: 'map',
      style: 'mapbox://styles/mapbox/streets-v11',
      center: [85.300140, 27.700769],
      zoom: 9,
    });



    // Add markers based on user interactions or predefined locations
    // For example, you can allow users to click on the map to add a marker
    map.on('click', function setCoords(event) {

        map.on('click', function() {
            marker.remove()
        });    

      const marker = new mapboxgl.Marker()
        .setLngLat(event.lngLat)
        .addTo(map);
      // Send the marker location to your server to make it visible to everyone
      // Implement the necessary logic on your server to store and share the marker information
   
        longitude = marker._lngLat.lng;
        latitude = marker._lngLat.lat;
      
     






    sendToServer(longitude,latitude);



    });











    
