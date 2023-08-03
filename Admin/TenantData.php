<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="style/style.css">
    <?php
        include 'adminHeader.php';
        $result = getTenantData();

        ?>
</head>
<body>
<div class="container" id="AdminContainer">
        <div class="heading">
            <h2>Tenant Data</h2>
        </div>
        <div class="Table">
            <table > 
            
            <tr>
                <th> SN.</th> 
                <th> Name </th> 
                <th> Email </th> 
                <th> Contact </th> 
                
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