   // Initialize the map

  
      let latitude , longitude;
  
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
        
        console.log(longitude,latitude);

      sendToServer(longitude,latitude);
  
  
  
      });
  
  
  
  
  
  
  
  
  
  
  
  
  
      
  
