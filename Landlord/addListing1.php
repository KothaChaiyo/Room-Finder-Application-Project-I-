
<?php
session_start();

include 'landlordHeader.php';




if(!isset($_SESSION['lname']) || !isset($_SESSION['lemail']) || !isset($_SESSION['lcontact'])){

    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "The requested URL was not found on this server.";
    exit;

}


?>




<?php

$title=$location=$size=$rent=$description="";

function input_data($data){
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if($_SERVER["REQUEST_METHOD"]=="POST"){
  $title = input_data($_POST["title"]);
  $location = input_data($_POST["location"]);
  $size = input_data($_POST["size"]);
  $rent = input_data($_POST["rent"]);
  $description = input_data($_POST["description"]);





}








?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Finder-Ultimate Property Finder</title>
    <link rel="icon" href="../Public/Images/NOSK_Logo_with_Tagline.png">

    <!-- for general styling of components  -->
    <!-- <link rel="stylesheet" href="../Public/style/style.css"> -->
    <!-- <link rel="stylesheet" href="../Public/style/addListing1.css"> -->


    <!-- for animation of components -->
    <!-- <link rel="stylesheet" href="../Public/style/animation.css"> -->

    <!-- <script src="../Public/script/index.js" defer></script> -->
    <!-- <script src="../Public/script/landlordHeader.js"></script> -->

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
        width:30vw;
        border:none;
        margin:20px;
        border-radius:10px;
        text-align:center;
        font-weight:bolder;
        font-size:1.5rem;
        position:static;
        left:10px;
        padding:2px;

      }

      textarea{
        height:10vh;
        width:30vw;
        border:none;
        border-radius:10px;
    
        font-weight:bolder;
        font-size:1.5rem;
        padding:10px;
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
        margin-left:15vw;
        cursor:pointer;
      }

      input[type="submit"]:hover{
        background-color:#065706;
      }

      #addListing{
        color:rgb(24, 200, 133);;
      }

      span#required{
        color:red;
        font-size:2rem;
      }
      
    </style>
</head>
<body>

<section class="main">
    <div class="addListingContainer">
      <div class="addListingContainerForm">
        <div class="addListingFormContainer" id="addListing1">
          <h2 id="addListingTitle">Add Listing</h2>
          <form action="" method="POST">
            <label for="propertyTitle" class="formLabel">Title</label> <span id="required">*</span>
            <input type="text" name="title" id="propertyTitle" class="inputTextFelid" required> <br>
            <label for="location" class="formLabel" >Location</label>  <span id="required">*</span>
            <input type="text"  name="location" id="propertyTitle" class="inputTextFelid" required><br>
            <label for="size" class="formLabel" >Size</label> <span id="required">*</span>
            <input type="text" name="size" id="propertySize" class="inputTextFelid" placeholder="Eg: single room, 1BHk" required><br>
            <label for="rent" class="formLabel" >Rent</label> <span id="required">*</span>
            <input type="number" name="rent" id="propertyRent" class="inputTextFelid" required><br>
            <label for="description" class="formLabel" >Description</label>  <span id="required">*</span>
            <textarea name="description" id="propertyDescription" class="inputTextFelid" cols = "30" rows="5" required></textarea><br>
            <br>
            <input type="submit" name="submit" value="Next" class="inputButton" >
          </form>
        </div>
      </div>
    </div>
  </section>
</body>
</html>



<?php



if(isset($_POST["submit"])){


    $_SESSION["title"] = $title;
    $_SESSION["location"] = $location;
    $_SESSION["size"] = $size;
    $_SESSION["rent"] = $rent;
    $_SESSION["description"] = $description;

    
    ?>

<script>
  window.location.href="addListing2.php";
</script>

<?php
  
  
  
}

?>

