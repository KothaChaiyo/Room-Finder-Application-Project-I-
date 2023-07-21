
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
    <!-- <link rel="stylesheet" href="../Public/style/addListing2.css"> -->


    <!-- for animation of components -->
    <!-- <link rel="stylesheet" href="../Public/style/animation.css"> -->

    <!-- <script src="../Public/script/index.js" defer></script> -->

    <!-- <script src="../Public/script/landlordHeader.js"></script> -->

    <title>AddListing</title>
</head>
<body>

    <section class="main">
    </div>
    <div class="addListingContainer">
      <div class="addListingContainerForm">
        <div class="addListingFormContainer" id="addListing1">
          <h2 id="addListingTitle">Add Listing</h2>
          <form action="" method="get">

            <label for="wifiAvailable" class="formLabel">Is wifi available ?</label><br>
            <label for="wifiAvailableYes" class="formLabel">Yes</label>
            <input type="radio" name="wifiAvailable" id="wifiAvailableYes" class="inputTextFelidRadio" value="wifiAvailableYes" required="required">
            <label for="wifiAvailableNo" class="formLabel">No</label>
            <input type="radio" name="wifiAvailable" id="wifiAvailableNO" class="inputTextFelidRadio"  Value = "wifiAvailableNo" required="required">
                  
            <br>
            <br>
          
            <label for="runningWater" class="formLabel">Is running Water available ?</label><br>
            <label for="runningWaterYes" class="formLabel">Yes</label>
            <input type="radio" name="runningWater" id="wifiAvailableYes" class="inputTextFelidRadio" value="runningWaterYes" required="required">
            <label for="runningWaterNo" class="formLabel">No</label>
            <input type="radio" name="runningWater" id="runningWaterNo" class="inputTextFelidRadio"  Value = "runningWaterNo" required="required">

            <br>
            <br>

            <label for="Upload Image" class="formLabel">Please Upload Images of Flat:</label><br>
            <input type="file" accept="image/*" id="flatImage1" class="formLabel" required="required"><br>
            <input type="file" accept="image/*" id="flatImage2" class="formLabel"><br>
            <input type="file" accept="image/*" id="flatImage3" class="formLabel"><br>

            <div class="map" id="mapLocation">

            </div>

            <input type="submit" value="Finish" class="inputButton" action = "" id="addListingFinish">

          </form>
        </div>
      </div>
    </div>
  </section>
</body>
</html>