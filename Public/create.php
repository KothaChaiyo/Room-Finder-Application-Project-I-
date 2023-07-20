<?php

include('./config.php');

$connect = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);

if($connect){
    echo "Connected to the Server...";
}else{
    echo "Could not connect to the server".mysqli_error($connect)."<br>";
}


//create database

$databaseName = 'KothaChaiyo';
$createDbQuery = "CREATE DATABASE IF NOT EXISTS $databaseName";


if (mysqli_query($connect, $createDbQuery)) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . mysqli_error($connect) . "<br>";
}


//create table 

$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD , DB_NAME);

if($connection){
    echo "Connected to KothaChaiyo Database succesfully";
}else{
    echo "Could not connect to the KothaChaiyo database".mysqli_error($connection)."<br>";
}

$tenantQuery = "CREATE TABLE tenant (
    t_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    email VARCHAR(50),
    password VARCHAR(50),
    contact VARCHAR(50)
);";


$landlordQuery = "CREATE TABLE landlord (
    l_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    email VARCHAR(50),
    password VARCHAR(50),
    contact VARCHAR(50)
);";

$adminQuery = "CREATE TABLE admin (
    email varchar(50) PRIMARY KEY,
    password varchar(50)
)";

$propertyQuery = "CREATE TABLE property (
    p_id INT AUTO_INCREMENT PRIMARY KEY,
    l_id INT,
    title VARCHAR(50),
    description VARCHAR(200),
    location VARCHAR(50),
    size VARCHAR(50),
    rent VARCHAR(50),
    image1 MEDIUMBLOB,
    image2 MEDIUMBLOB,
    image3 MEDIUMBLOB,
    coords VARCHAR(50),
    hasWifi VARCHAR(50),
    has_parking VARCHAR(50),
    has_running_water VARCHAR(50)
);";


if (mysqli_query($connection, $tenantQuery)) {
    echo "Tenant table created successfully<br>";
} else {
    echo "Error creating tenant table: " . mysqli_error($connection) . "<br>";
}


if (mysqli_query($connection, $landlordQuery)) {
    echo "Landlord table created successfully<br>";
} else {
    echo "Error creating landlord table: " . mysqli_error($connection) . "<br>";
}



if (mysqli_query($connection, $adminQuery)) {
    echo "Admin table created successfully<br>";
} else {
    echo "Error creating admin table: " . mysqli_error($connection) . "<br>";
}


if (mysqli_query($connection, $propertyQuery)) {
    echo "Property table created successfully<br>";
} else {
    echo "Error creating property table: " . mysqli_error($connection) . "<br>";
}


//making lid foreign key in property table

$fkQuery = "ALTER TABLE property
ADD CONSTRAINT fk_lid
FOREIGN KEY (l_id)
REFERENCES landlord (l_id);";


if (mysqli_query($connection, $fkQuery)) {
    echo "l_id is now a foreign key in property table<br>";
} else {
    echo "Could not make l_id as foreign key in property table " . mysqli_error($connection) . "<br>";
}














?>