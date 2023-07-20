<?php
session_start();
echo "Tenant Homepage <br>";
echo "Welcome!!! "; 
echo $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
    </style>
</head>

<body>
    <a href="/Raaz/project/Room-Finder-Application-Project-I-/Public/logout.php"target="_blank">Logout</a>
    
</body>
</html>