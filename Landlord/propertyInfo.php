
<?php
session_start();



if(!isset($_SESSION['lname']) || !isset($_SESSION['lemail']) || !isset($_SESSION['lcontact'])){

    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "The requested URL was not found on this server.";
    exit;

}



if (isset($_COOKIE['p_id'])) {
  $p_id = $_COOKIE['p_id'];

  // setcookie('p_id', '', time() - 3600, '/');

  // echo "The value of myCookie is: " . $p_id;


} 




include 'landlordHeader.php';

define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'KothaChaiyo');


// Establish database connection
$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}






$query = "SELECT * FROM property WHERE p_id = $p_id";

$result  = mysqli_query($connection,$query);








while ($row = mysqli_fetch_assoc($result)) {


    $LID = $row['l_id'];

    $q1 = "SELECT contact FROM landlord WHERE l_id = $LID";

    $res = mysqli_query($connection,$q1);

    $count = mysqli_num_rows($res);

    if($count==1){
      $array=mysqli_fetch_assoc($res);
      $contact= $array['contact'];
    }

    


  ?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Property Information</title>
    <!-- <link rel="stylesheet" href="../Public/style/propertyInfo.css"> -->
    <!-- <script src="../Public/script/landlordHeader.js"></script> -->

    <!-- <script src="./staticMap.js" ></script> -->

    <link href="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css" rel="stylesheet" />

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src="https://kit.fontawesome.com/e6ea350d00.js" crossorigin="anonymous"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js" ></script>

 

    <style>
       body{

background-color:#e3e6f1;
font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
}

        div.container{
          border:2px solid green;
          width:80%;
          margin-left:5vw;
        box-shadow:10px 10px 10px 10px gray;

        border-radius:10px;
        font-weight:500;


        }

        p.container-head{
          font-size:3rem;
          /* text-align:center; */
          margin-left:25vw;
          font-weight:bolder;
          color:#136a49;

        }

        div.container-imageCarousel{
          width:45vw;
          margin-left:15%;
          margin-top:2vw;
          
        }

        div.container-imageCarousel img{
          width:100%;

        }

        span.container-title{
          font-weight:bolder;
          font-size:2rem;
          display:block;
          text-align:center;
          word-wrap:break-word;
          height:fit-content;
          width:80%;
          /* background-color:green; */
          margin-left:10%;
          

        }

        div.container-description{
          margin-left:10%;
          font-size:1.7rem;
          width:80%;
          /* background-color:red; */
          word-wrap:break-word;
          height:fit-content;
        }
        div.container-address{
          margin-left:10%;
          font-size:1.7rem;
          width:80%;
          word-wrap: break-word;
          overflow:hidden;
          text-overflow: ellipsis;

        }
        div.amenities{
          margin-left:10%;
          font-size:1.7rem;
          width:80%;
          word-wrap:break-word;
          height:fit-content;

        }

        div.container-wifi{
          margin-left:10%;
          font-size:1.7rem;
          width:80%;
          word-wrap:break-word;
          height:fit-content;

        }

        div.container-water{
          margin-left:10%;
          font-size:1.7rem;
          width:80%;
          word-wrap:break-word;
          height:fit-content;

        }

        div.container-parking{
          margin-left:10%;
          font-size:1.7rem;
          width:80%;
          word-wrap:break-word;
          height:fit-content;

        }

        div.container-size{
          margin-left:10%;
          font-size:1.7rem;
          width:80%;
          word-wrap:break-word;
          height:fit-content;

        }

        div.container-rent{
          margin-left:10%;
          font-size:1.7rem;
          width:80%;
          word-wrap:break-word;
          height:fit-content;

        }

        div.mapTitle{
          /* margin-left:10%; */
          font-size:1.7rem;
        }

        div.container-map{
          width:50vw;
          /* border:2px solid black; */

          height:500px;
          margin-left:10%;
        }

        div.contactOwner{
          margin-left:38%;
          background-color:#053367;
          width:fit-content;
          height:40px;
          font-weight:bolder;
          font-size:1.5rem;
          color:white;
          padding:5px;
          border-radius:10px;

          
        }

        div.map{
          /* border:2px solid black; */
          height:92%;
          width:100%:
        }


        /* new */

      

/* Slideshow container */
.slideshow-container {
  /* max-width: 1000px; */
  position: relative;
  margin: auto;
  height:100%;
  width:100%;
}

.slideshow-container img{
  height:100%;
  width:100%;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  /* color: white; */
  color:black;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  /* color: #f2f2f2; */
  color:black;
  font-size: 25px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  /* color: #f2f2f2; */
  color:black;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}


@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}
        



/* landlord only start  */

.delete input{

  margin-left:38%;
      
       
  height:55px;
  font-weight:bolder;
     
        
  padding:5px;
     

  margin-left : 43%;
  margin-top:2vw;
  /* height:3rem; */
  width:10rem;
  border-radius:10px;
  border:none;
  color:red;

 
  
  font-size:1rem;
  background-color:#053367; 
  cursor: pointer;

}



/* landlord only end  */


          /* new  */


          @media screen and (max-width:1400px){

            div.contactOwner{
          margin-left:30%;
        

          
        }

        @media screen  and (max-width:1200px){
            p.container-head{
              font-size:2rem;
            }

            span.container-title{
              font-size:1.5rem;
            }

            div.container-description{
              font-size:1.2rem;
            }

        
        }
          }




        @media screen  and (max-width:800px){

          div.container{
            width:90%;
            margin-left:1vw;
          }
            p.container-head{
              font-size:2rem;
              margin-left:10rem;
            }

            span.container-title{
              font-size:1.5rem;
            }

            div.container-description{
              font-size:1.2rem;
            }

            div.contactOwner{
              margin-left:20%;
            }

            .delete input{

margin-left:36%;
    
     


}

            div.container-map{
          width:65vw;
          margin-left:1vw;
      
        }

        div.container-imageCarousel{
          width:65vw;
          margin-left:1vw;
       
          
        }

        
        }



        @media screen  and (max-width:700px){

div.container{
  width:95%;
  margin-left:1vw;
}
  p.container-head{
    font-size:2rem;
    margin-left:0;
    text-align:center;
  }

  span.container-title{
    font-size:1.5rem;
    /* margin-left:0; */
    text-align:center;

  }

  div.container-description{
    font-size:1.2rem;
  }

  div.contactOwner{
    margin-left:20%;
    
  }


  .delete input{

margin-left:36%;
height:6vw;
width:25vw;
min-width:100px;
/* font-size:15px; */
font-size:3vw;

border-radius:5px;
    
}


  div.container-map{
width:85vw;
margin-left:1vw;

}

div.container-imageCarousel{
width:80vw;
margin-left:5vw;


}

div.contactOwner{
  font-size:3vw;
  height:5vw;
  margin-left:30%;
}


}



@media screen and (max-width:300px){
  div.contactOwner , div.delete input{
    margin-left:10%;
    height:20px;
  }
}



          
      
    </style>
  </head>
  <body>

    <section class="main ">

    <p class="container-head">Property Information</p>

    <div class="container">



      <div class="container-imageCarousel"> 
          <!-- <img src="../Public/Images/homeBackground.jpg" alt=""> -->


          <!-- new  -->
                <!-- Slideshow container -->
<div class="slideshow-container">

<!-- Full-width images with number and caption text -->
<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>


  <img src="data:image/jpeg;base64,<?php echo base64_encode($row['image1']); ?>" alt="Image <?php echo $i+1; ?>">


</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="data:image/jpeg;base64,<?php echo base64_encode($row['image2']); ?>" alt="Image <?php echo $i+1; ?>">


</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="data:image/jpeg;base64,<?php echo base64_encode($row['image3']); ?>" alt="Image <?php echo $i+1; ?>">


</div>

<!-- Next and previous buttons -->
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
<span class="dot" onclick="currentSlide(1)"></span>
<span class="dot" onclick="currentSlide(2)"></span>
<span class="dot" onclick="currentSlide(3)"></span>
</div>

          <!-- new  -->
      </div>
      
      <br>



      <span class="container-title"><?php echo $row['title'] ?></span><br>
      <div class="container-description"><br><?php echo $row['description'] ?> <br> </div><br>
      <div class="container-address">Address: <?php echo $row['location'] ?></div><br><br>

      <div class="amenities">Amenities</div> <br>
      <div class="container-wifi">WiFi <i class="fa-solid fa-wifi"></i>: <?php echo $row['hasWifi'] ?></div>
      <div class="container-water">Running Water <i class="fa-solid fa-faucet"></i>: <?php echo $row['has_running_water'] ?></div>
      <div class="container-parking">Parking <i class="fa-solid fa-car"></i>:<?php echo $row['has_parking'] ?></div> <br><br>

      <div class="container-size">Size <i class="fa-solid fa-house"></i> : <?php echo $row['size'] ?></div>
      <div class="container-rent">Rent : <i class="fa-solid fa-indian-rupee-sign"></i><?php echo $row['rent'] ?></div>








<br><br>
      <div class="container-map">

        <div class="mapTitle">Location on map:</div>

        <p id="NA" style="display:none;color:red;font-weight:bolder;font-size:3rem;text-align:center;opacity:1;">NA</p>

        <div class="map" id="map"></div>




      </div>




<br><br>
      <div class="contactOwner">
        Ring Owner <i class="fa-solid fa-phone-volume"></i> : <?php echo  $contact; ?>
      </div>

      <!-- for landlord only start  -->
      <div class="delete">
       <form action="" method="POST">
        <input type="submit" name="delete" value="Delete Property" onclick="return confirmDelete()">
      </form> 
      </div>

      <!-- for landlord only end  -->

      <br><br>
    </div>

    <br><br>
  </section>
  </body>

  <?php

          $coords = $row['coords'];
       
          
          $pos = strpos($coords, '+');

      if ($pos !== false) {
    // Split the string into two parts using explode()
    $longitude = substr($coords, 0, $pos);
    $latitude = substr($coords, $pos + 1);
   

}else{
  $longitude = "";
  $latitude = "";
}

?>


  <script>



let latitude = `<?php echo $latitude; ?>`;
  let longitude = `<?php echo $longitude; ?>`;



  if(latitude==" " && longitude == " "){
    document.getElementById("map").style.display = "none";
    document.getElementById("NA").style.display = "block";
    document.getElementsByClassName("contactOwner")[0].style.marginTop="-250px";
  }


mapboxgl.accessToken = 'pk.eyJ1IjoidGhlLW1heS1ndXkiLCJhIjoiY2xoeXkyemxtMGJqbTNkcDV4cDRtYW5tNiJ9.ngKtQaQqRWtYdwNqpO3Tnw';
      const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [latitude, longitude],
        zoom: 12,
      });






  const marker = new mapboxgl.Marker()
.setLngLat([latitude, longitude])
.addTo(map);

    

// new 


let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}







  </script>



<!-- landlord only start -->
<script>
function confirmDelete() {
            // Show the confirmation dialog box
            var result = confirm("Do you really want to delete?");

            // If the user clicks 'OK' (Yes), proceed with the form submission
            return result;
        }
 </script>

<!-- landlord only end -->



</html>

<?php
  
}



// for landlord only start 


// logic to delete property 

if(isset($_POST["delete"])){
  $deleteQuery = "DELETE FROM property WHERE p_id = $p_id";

  $deleteResult = mysqli_query($connection,$deleteQuery);

  if($deleteResult){
   ?>

    <script>window.location.href="landlordHome.php"</script>

<?php
  }

}


// for landlord only end

?>