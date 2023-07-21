
<?php
session_start();



if(!isset($_SESSION['lname']) || !isset($_SESSION['lemail']) || !isset($_SESSION['lcontact'])){

    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "The requested URL was not found on this server.";
    exit;

}

include 'landlordHeader.php';

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
</head>
<body>

<section class="main">
    <div class="addListingContainer">
      <div class="addListingContainerForm">
        <div class="addListingFormContainer" id="addListing1">
          <h2 id="addListingTitle">Add Listing</h2>
          <form action="" method="get">
            <label for="propertyTitle" class="formLabel">Title</label>
            <input type="text" name="propertyTitle" id="propertyTitle" class="inputTextFelid" required><br>
            <label for="location" class="formLabel" >Location</label>
            <input type="text" placeholder="Eg: single room 1BHk" name="location" id="propertyTitle" class="inputTextFelid" required><br>
            <label for="size" class="formLabel" >Size</label>
            <input type="text" name="size" id="propertySize" class="inputTextFelid" required><br>
            <label for="rent" class="formLabel" >Rent</label>
            <input type="number" name="rent" id="propertyRent" class="inputTextFelid" required><br>
            <label for="description" class="formLabel" >Description</label>
            <textarea name="Description" id="propertyDescription" class="inputTextFelid" cols = "30" rows="5"></textarea><br>
            <br>
            <input type="submit" value="Next" class="inputButton"  action = "addListing2.php">
          </form>
        </div>
      </div>
    </div>
  </section>
</body>
</html>