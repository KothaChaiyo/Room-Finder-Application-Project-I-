
<?php
session_start();



if(!isset($_SESSION['lname']) || !isset($_SESSION['lemail']) || !isset($_SESSION['lcontact']) || !isset($_SESSION['title'])|| !isset($_SESSION['description'])|| !isset($_SESSION['location'])|| !isset($_SESSION['size'])|| !isset($_SESSION['rent'])){

header("HTTP/1.0 404 Not Found");
echo "<h1>404 Not Found</h1>";
echo "The requested URL was not found on this server.";
exit;

}



include 'landlordHeader.php';
// include '../Public/connect.php';













$title = $_SESSION["title"];
$location = $_SESSION["location"];
$size = $_SESSION["size"];
$rent = $_SESSION["rent"];
$description = $_SESSION["description"];



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

$email = $_SESSION['lemail'];
$query1 = "SELECT l_id FROM landlord WHERE email='$email' ";

$q1 = mysqli_query($connection,$query1);
$array=mysqli_fetch_assoc($q1);
$_SESSION['l_id']= $array['l_id'];

$landlordId = $_SESSION['l_id'];





  





$wifi=$runningWater=$parking="";


function input_data($data){
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if($_SERVER["REQUEST_METHOD"]=="POST"){




if (isset($_COOKIE['latitude']) && isset($_COOKIE['longitude'])) {
  //   // Retrieve the cookie values
    $latitude = $_COOKIE['latitude'];
    $longitude = $_COOKIE['longitude'];


  
    $coords = $latitude."+".$longitude;
  
  
  setcookie("longitude", "", time() - 3600, "/");
  setcookie("latitude", "", time() - 3600, "/");
  
  
  
  
  
    // setcookie("latitude", "", time() - 3600, "/");
    // setcookie("longitude", "", time() - 3600, "/");
  
  
  
  
  
    // You can now use $latitude and $longitude in your PHP code
    // For example, echo them to display the values
    // echo "Latitude: " . $latitude . "<br>";
  //   // echo "Longitude: " . $longitude;
  }else{
    $coords = "+";
  }

  


      $wifi=input_data($_POST['wifi']);
      $runningWater=input_data($_POST['runningWater']);
      $parking=input_data($_POST['parking']);


      $imgData1 = addslashes(file_get_contents($_FILES['image1']['tmp_name']));
      $imgData2 = addslashes(file_get_contents($_FILES['image2']['tmp_name']));
      $imgData3 = addslashes(file_get_contents($_FILES['image3']['tmp_name']));




      
      







}



?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Finder-Ultimate Property Finder</title>
    <link rel="icon" href="../Public/Images/kothaChaiyoLogo.png">

    <!-- for general styling of components  -->
    <!-- <link rel="stylesheet" href="../Public/style/style.css"> -->
    <!-- <link rel="stylesheet" href="../Public/style/addListing2.css"> -->


    <!-- for animation of components -->
    <!-- <link rel="stylesheet" href="../Public/style/animation.css"> -->

    <!-- <script src="../Public/script/index.js" defer></script> -->

    <!-- <script src="../Public/script/landlordHeader.js"></script> -->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <title>AddListing</title>

    <style>
            body{

background-color:#e3e6f1;
font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif




}

#addListingTitle{
color:#136a49;
font-size:3vw;
margin-left:15vw;
}

label{
font-size:2rem;
color:#003c54 ;
font-weight:bolder;

}

input{
height:5vh;


border:none;
/* margin:30px; */
border-radius:10px;
text-align:center;
font-weight:bolder;
font-size:1.5rem;
position:static;
left:10px;
/* padding:2px; */

}

input[type="radio"]{
  width:3vw;

  position:relative;
  top:10px;
  margin-right:20px;
  accent-color:green;
}



div.addListingFormContainer{
border:2px solid green;
margin-left:5vw;
padding:10px;
height:fit-content;
width:60%;
border-radius:10px;
box-shadow:10px 10px 10px 10px gray;
background-color:#e3e6f1;

}

input[type="submit"]{
background-color:green;
width:10vw;
height:3vw;
border:none;
color:white;
font-weight:bolder;
margin-left:20vw;
cursor:pointer;
}

input[type="submit"]:hover{
background-color:#065706;
}

#addListing{
color:rgb(24, 200, 133);;
}
form input{
  padding-top:10px;
}

div#map{
  height:500px;
  width:48vw;
  background-color:green;
  margin-left:1.1vw;
}

span#required{
  color:red;
  font-size:2rem;
}

    </style>


<link href="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css" rel="stylesheet" />


<script src="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js" ></script>
<script src="map.mjs" defer></script>


<script>
  
let latitude = " ";
let longitude = " ";



function setcookie(name, value, daysToExpire) {
    var cookieValue = name + "=" + encodeURIComponent(value);
  
    if (daysToExpire) {
      var expirationDate = new Date();
      expirationDate.setTime(expirationDate.getTime() + (daysToExpire * 24 * 60 * 60 * 1000));
      cookieValue += "; expires=" + expirationDate.toUTCString();
    }
  
    document.cookie = cookieValue + "; path=/";
  }




setcookie("longitude", longitude);
setcookie("latitude", latitude);




</script>

</head>
<body>

    <section class="main">  




    </div>
    <div class="addListingContainer">
      <div class="addListingContainerForm">
        <div class="addListingFormContainer" id="addListing1">
          <h2 id="addListingTitle">Add Listing</h2>
          <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validate();">

            <label for="wifiAvailable" class="formLabel">Is wifi available ?</label> <span id="required">*</span> <br>
            <label for="wifiAvailableYes" class="formLabel">Yes</label>
            <input type="radio" name="wifi" id="wifiAvailableYes" class="inputTextFelidRadio" value="Yes" required>
            <label for="wifiAvailableNo" class="formLabel">No</label>
            <input type="radio" name="wifi" id="wifiAvailableNO" class="inputTextFelidRadio"  value = "No" required>
                  
            <br>
            <br>
          
            <label for="runningWater" class="formLabel">Is running Water available ?</label>  <span id="required">*</span><br>
            <label for="runningWaterYes" class="formLabel">Yes</label>
            <input type="radio" name="runningWater" id="wifiAvailableYes" class="inputTextFelidRadio" value="Yes" required>
            <label for="runningWaterNo" class="formLabel">No</label>
            <input type="radio" name="runningWater" id="runningWaterNo" class="inputTextFelidRadio"  Value = "No" required>

            <br>
            <br>


            <label for="parkingAvailable" class="formLabel">Is Parking available ?</label> <span id="required">*</span><br>
            <label for="parkingAvailableYes" class="formLabel">Yes</label>
            <input type="radio" name="parking" id="parkingAvailableYes" class="inputTextFelidRadio" value="Yes" required>
            <label for="parkingAvailableNo" class="formLabel">No</label>
            <input type="radio" name="parking" id="parkingAvailableNo" class="inputTextFelidRadio"  Value = "No" required>
                  
            <br>
            <br>

            <label for="Upload Image" class="formLabel">Please Upload Images of Flat:</label> <span id="required">*</span> <br>
            <input type="file" name="image1" accept="image/*" id="flatImage1" class="formLabel" required> <br>
            <input type="file" name="image2" accept="image/*" id="flatImage2" class="formLabel" required><br>
            <input type="file" name="image3" accept="image/*" id="flatImage3" class="formLabel" required><br>

              <br>
              <br>

            <label for="map" class="formLabel">Please pin the Location on map (optional)</label><br>

            <div id="map">

            </div>

       
            <br><br>

            <input type="submit" name="submit" value="Finish" class="inputButton" action = "" id="addListingFinish">
              <br>
              <br>
          </form> 
        </div>
      </div>
    </div>
  </section>








</body>
</html>



<?php

if(isset($_POST["submit"])){


//  $insQuery = "INSERT INTO property(l_id,title,description,location,size,rent,image1,image2,image3,coords,hasWifi,has_parking,has_running_water) values($landlordId,'$title','$description','$location','$size','$rent','$imgData1','$imgData2','$imgData3','123','$wifi','$parking','$runningWater')";


$insQuery = "INSERT INTO property(l_id,title,description,location,size,rent,image1,image2,image3,coords,hasWifi,has_parking,has_running_water) values($landlordId,'$title','$description','$location','$size','$rent','$imgData1','$imgData2','$imgData3','$coords','$wifi','$parking','$runningWater')";

mysqli_query($connection,$insQuery);

unset($_SESSION['title']);
unset($_SESSION['description']);
unset($_SESSION['size']);
unset($_SESSION['location']);
unset($_SESSION['rent']);


  ?>

<script>window.location.href="landlordHome.php"</script>

<?php

}


?>