<?php


include '../Public/connect.php';

function getTenantData(){
    global $connection;
    $query="select t_id,name,email,contact from tenant"; 
    $result = mysqli_query($connection,$query); 
    return $result;
}

function getLandlordData(){
    global $connection;
    $query="select l_id,name,email,contact from landlord"; 
    $result = mysqli_query($connection,$query); 
    return $result;
}
function getLandlordNumber(){
    global $connection;
    $query = "select count(*) from landlord";
    $result = mysqli_query($connection,$query);
    $rows=mysqli_fetch_assoc($result);
    return( $rows['count(*)']);
}

function getTenantNumber(){
    global $connection;
    $query = "select count(*) from tenant";
    $result = mysqli_query($connection,$query);
    $rows=mysqli_fetch_assoc($result);
    return( $rows['count(*)']);
}

function getTotalPropertyListedNumber(){
    global $connection;
    $query = "select count(*) from property";
    $result = mysqli_query($connection,$query);
    $rows=mysqli_fetch_assoc($result);
    return( $rows['count(*)']);
}

function getNoOfPropertyListed($id){
    global $connection;
    $query = "select count(*) from property where l_id = '$id'";
    $result = mysqli_query($connection,$query);
    $rows=mysqli_fetch_assoc($result);
    return( $rows['count(*)']);
}

?>

