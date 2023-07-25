<?php

session_start();

if(!isset($_SESSION['tname']) || !isset($_SESSION['temail']) || !isset($_SESSION['tcontact'])){

    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "The requested URL was not found on this server.";
    exit;

}




include 'tenantHeader.php';

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Account Information</title>
    <link rel="stylesheet" href="../Public/style/accountInfo.css" />
    <!-- <script src="../Public/script/tenantHeader.js" "defer"></script> -->
    
  </head>
  <body>
    <section class="main">
    <div class="container"style="">
      <p class="container-head">Account Information</p>
      <span class="container-img"><img src="../Public/Images/username.png" alt="images"></span><br>
      <spad class="no-bold">Name:</span> <span class="container-userName bold"><?php echo $_SESSION['tname']?></span><br>
      <span class="no-bold">Email:</span> <span class="container-email bold"><?php echo $_SESSION['temail']?></span><br>
      <span class="no-bold">Contact&phone; :</span><span class="container-contact bold"><?php echo $_SESSION['tcontact']?></span><br>
    </div>
  </section>
  </body>
</html>
