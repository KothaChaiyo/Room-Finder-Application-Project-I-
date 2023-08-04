<?php

session_start();



if( !isset($_SESSION['aemail'])){

    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "The requested URL was not found on this server.";
    exit;

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin</title>

    <style>

        div.logOut{
     
            display:flex;
            justify-content:center;
            align-items:center;
            height:5vh;
        }

        div.logOut a{
        
    padding: 10px 20px;
    margin: 5px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: #ffffff;
    font-size: 16px;
    cursor: pointer;
    text-decoration:none;
    width:5vw;
    text-align:center;
        }

        @media screen and (max-width:1300px) {
            div.logOut a{
                width:7vw;
            }
        }

        @media screen and (max-width:850px) {
            div.logOut a{
                width:10vw;
            }
        }

        @media screen and (max-width:600px) {
            div.logOut a{
                width:15vw;
            }
        }


        @media screen and (max-width:400px) {
            div.logOut a{
                width:20vw;
               
            }
        }


        @media screen and (max-width:300px) {
            div.logOut a{
                width:30vw;
               
            }
        }


    </style>
    <?php
        include 'adminHeader.php';
    ?>
</head>
<body>
    <div class="landingContainer" id="AdminContainer">
        <div class="Welcome">
            <h2>Welcome, Admin</h2>
        </div>
        <div class="summary">
            <h3>Analytics:</h3>
            <div class="icons">
                <div class="totalTenants">
                    <img src="./icons/tenant.png" alt="" srcset="">
                    <h4> Total Tenant: <?php echo(getTenantNumber()) ?> </h4>
                </div>
                <div class="totalLandlords">
                    <img src="./icons/landLord.png" alt="" srcset="">
                    <h4> Total Landlord: <?php echo(getLandlordNumber()) ?> </h4>
                </div>
                <div class="totalRegistered">
                    <img src="./icons/property.png" alt="" srcset="">
                    <h4> Total property: <?php echo(getTotalPropertyListedNumber()) ?> </h4>
                </div>
            </div>
            <div class="buttons">
                <button type="button" id="tenantDataButton" onclick="location.href = 'TenantData.php' ">View Tenant Data</button>
                <button type="button" id="landlordDataButton" onclick="location.href = 'LandlordData.php' ">View Landlord Data</button>
            </div>
        </div>

    
    </div>

    <div class="logOut">
         <a href="./logout.php"><i class="fa fa-fw fa-sign-out"></i> Log Out</a>
        </div>


</body>
</html>