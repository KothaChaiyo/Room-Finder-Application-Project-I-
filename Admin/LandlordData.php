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
    <title>Admin</title>
        <?php
        include 'adminHeader.php';
        $result = getLandlordData();

        ?>
</head>
<body>
    <div class="container" id="AdminContainer">
        <div class="heading">
            <h2>Landlord Data</h2>
        </div>
        <div class="Table">
            <table > 
            <tr>
                <th> SN.</th> 
                <th> Name </th> 
                <th> Email </th> 
                <th> Contact </th> 
                <th> No. of Property Listed</th>
                
            </tr> 
            
                <?php 
                    $i = 1;
                    while($rows=mysqli_fetch_assoc($result)) 
                { 
                ?> 
                <tr> <td><?php echo $i++; ?></td> 
                <td><?php echo $rows['name']; ?></td> 
                <td><?php echo $rows['email']; ?></td> 
                <td><?php echo $rows['contact']; ?></td>
                <td><?php echo getNoOfPropertyListed($rows['l_id']) ?></td> 
            </tr> 
                <?php 
                } 
                ?> 

            </table> 
        </div>
            
        </div>
    </div>
</body>
</html>