<?php

define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'KothaChaiyo');

define('PASSWORD','Barcelonist');




// Establish database connection
$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    echo " <script>
    console.log('Database Connected')
    </script>
    ";
}

$email = "admin@gmail.com";
$pass = md5("admin@123");

$createAdmin = "INSERT INTO admin VALUES ('$email','$pass')";


if (mysqli_query($connection, $createAdmin)) {
    echo "Admin created successfully<br>";
} else {
    echo "Error creating admin: " . mysqli_error($connection) . "<br>";
}

?>