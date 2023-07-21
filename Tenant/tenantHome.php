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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Public/style/tenantHome.css">
    <!-- <script src="../Public/script/tenantHeader.js"></script> -->
 
</head>

<body>

<section class="main">
    <?php
echo "Tenant Homepage <br>";
echo "Welcome!!! "; 
echo $_SESSION['tname'];

?>
    <a href="../Public/logout.php"target="_self">Logout</a>

</section>
    
</body>
</html>