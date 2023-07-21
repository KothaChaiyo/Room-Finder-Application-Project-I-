
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- <script src="../Public/script/landlordHeader.js"></script> -->
     <link rel="stylesheet" href="../Public/style/landlordHome.css">
</head>

<body>

<section class="main">



<?php
    echo "Landlord Homepage <br>";
echo "Welcome!!! "; 
echo $_SESSION['lname'];


?>
    <a href="../Public/logout.php"target="_self">Logout</a>

    </section>
    
</body>
</html>