
<?php
session_start();





if(!isset($_SESSION['lname']) || !isset($_SESSION['lemail']) || !isset($_SESSION['lcontact'])){

    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "The requested URL was not found on this server.";
    exit;

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



$email = $_SESSION['lemail'];
$query1 = "SELECT l_id FROM landlord WHERE email='$email' ";

$q1 = mysqli_query($connection,$query1);
$array=mysqli_fetch_assoc($q1);
$_SESSION['l_id']= $array['l_id'];

$landlordId = $_SESSION['l_id'];


$query2 = "SELECT * FROM property WHERE l_id=$landlordId";

$q2 = mysqli_query($connection,$query2);

$countProperty = mysqli_num_rows($q2);





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
    <link rel="icon" href="../Public/Images/kothaChaiyoLogo.png">

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
        color:rgb(24, 200, 133);
      }

      span#required{
        color:red;
        font-size:2rem;
      }


      @media screen and (max-width:1300px) {
        div.addListingFormContainer{
     
        margin-left:5vw;
        padding:10px;
        height:fit-content;
        width:70%;
    
    
      }
      input{
        width:70%;
      }

      label{
        font-size:1.5rem;
      }

      input[type="submit"]{
        background-color:green;
        width:18vw;
        height:5vw;



    
      }

      }


      @media screen and (max-width:1300px) {
        div.addListingFormContainer{
     
        margin-left:5vw;
        padding:10px;
        height:fit-content;
        width:80%;
    
    
      }
    }



    @media screen and (max-width:900px) {
        div.addListingFormContainer{
     
        margin-left:3vw;
        padding:10px;
        height:fit-content;
        width:90%;
    
    
      }

      label{
        font-size:1.3rem;
      }


      input[type="submit"]{
        background-color:green;
        width:22vw;
        height:6vw;



    
      }


    }
      

    @media screen and (max-width:700px) {
        div.addListingFormContainer{
     
        margin-left:1vw;
        padding:10px;
        margin-top:5vh;
        height:fit-content;
        width:90%;
        
    
    
      }

      #addListingTitle{
        color:#136a49;
        font-size:5vw;
        margin-left:28vw;
      }

      label{
        font-size:1.5rem;
      }
      input{
        width:90%;
        margin-left:0;
        margin-top:-2px;
      }

      textarea{
        width:90%;
      }



      input[type="submit"]{
        background-color:green;
        width:25vw;
        height:8vw;
        margin-left:35%;



    
      }


      
    }



    @media screen and (max-width:500px) {
  

      label{
        font-size:1rem;
      }
      input{
    
        font-size:1rem;
        border-radius:3px;
      }

      textarea{
   
        font-size:1rem;
      
      }
      
    }


    @media screen and (max-width:300px) {


    div.addListingFormContainer{
     
     margin-left:-1vw;
     padding:5px;
     height:fit-content;
     width:95%;
 
 
   }


#addListingTitle{
  font-size:1rem;
}

    

  label{
    font-size:0.8rem;
  }
  input{

    font-size:0.8rem;
    height:4vh;
    
  }

  textarea{

    font-size:0.8rem;
  
  }
  
}



@media screen and (max-width:250px) {


    

  label{
    font-size:0.5rem;
  }
  input{

    font-size:0.5rem;
    height:4vh;
    
  }

  textarea{

    font-size:0.5rem;
  
  }
  
}
    </style>
</head>
<body>

<section class="main">
<?php

if($countProperty>=2){

header("HTTP/1.0 404 Not Found");
echo "<h1 style='color:red;font-size:60px;font-weight:bolder;'>Sorry!</h1>";
echo "<p style='font-weight:bolder;font-size:20px;'>You cannot add more than 2 concurrent listings. </p>";
exit;

}

?>

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

