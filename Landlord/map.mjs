// async function writeCoordinates() {

//     await fetch("coordinates.json", {
//          method: "POST",
//          headers: {
//              'Content-Type': 'application/json'  
//          },
//          body: JSON.stringify({
//              "latitude": latitude,
//              "longitude": longitude
//          })
//      });
     
//      // const data = await response.json();
     
//      // console.log(data);  
 
//     }


let latitude = "";
let longitude = "";



setCookie("longitude", `${longitude}`);
setCookie("latitude", `${latitude}`,);


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


//     let d = new Date();

// d.setTime(d.getTime() + (30 * 1000)); // Add 30 seconds to the current time
// // var expires = "expires=" + d.toUTCString();


// var expires = "expires="+d.toGMTString();

setCookie("longitude" , `${longitude}`);
setCookie("latitude" , `${latitude}`);









// document.cookie = "latitude=" + latitude + "; " + expires + "; path=/";
// document.cookie = "longitude=" + longitude + "; " + expires + "; path=/";



// document.cookie = "latitude=" + latitude + "; expires=Fri, 31 Dec 9999 23:59:59 GMT";
// document.cookie = "longitude=" + longitude + "; expires=Fri, 31 Dec 9999 23:59:59 GMT";





  // Send the JavaScript variable to the PHP script using AJAX
//   $.ajax({
//     type: "POST", // You can use "GET" if appropriate
//     url: "addListing2.php",
//     data: { longitude: longitude, latitude : latitude }, // Send the data to PHP
//     success: function(response) {
//       console.log("Response from PHP: " + response);
//     }
//   });



}


      
//   API Key : pk.eyJ1IjoidGhlLW1heS1ndXkiLCJhIjoiY2xoeXkyemxtMGJqbTNkcDV4cDRtYW5tNiJ9.ngKtQaQqRWtYdwNqpO3Tnw

    // Initialize the map
    mapboxgl.accessToken = 'pk.eyJ1IjoidGhlLW1heS1ndXkiLCJhIjoiY2xoeXkyemxtMGJqbTNkcDV4cDRtYW5tNiJ9.ngKtQaQqRWtYdwNqpO3Tnw';
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
      
     


    //   writeCoordinates();



    sendToServer(longitude,latitude);



    });



    // map.addEventListener("click",function setCoords(event){

    //     marker.remove();

    //     const marker = new mapboxgl.Marker({
    //         color: "#FFFFFF",
    //         draggable: true
    //         }).setLngLat(event.lngLat)
    //         .addTo(map);
        
        

    //    longitude = marker._lngLat.lng;
    //    latitude = marker._lngLat.lat;
      
    //   console.log(longitude,latitude);

    //   writeCoordinates();
        
      
    // });
    
    // // Add predefined markers
    // const marker1 = new mapboxgl.Marker()
    //   .setLngLat([85.300140, 27.700769])
    //   .addTo(map);
  

  
    // ...









    
