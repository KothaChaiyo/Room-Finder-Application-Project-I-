<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Admin</title>
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
                    <img src="icons/tenant.png" alt="" srcset="">
                    <h4> Total Tenant: <?php echo(getTenantNumber()) ?> </h4>
                </div>
                <div class="totalLandlords">
                    <img src="icons/landlord.png" alt="" srcset="">
                    <h4> Total Landlord: <?php echo(getLandlordNumber()) ?> </h4>
                </div>
                <div class="totalRegistered">
                    <img src="icons/property.png" alt="" srcset="">
                    <h4> Total property: <?php echo(getTotalPropertyListedNumber()) ?> </h4>
                </div>
            </div>
            <div class="buttons">
                <button type="button" id="tenantDataButton" onclick="location.href = 'TenantData.php' ">View Tenant Data</button>
                <button type="button" id="landlordDataButton" onclick="location.href = 'landLordData.php' ">View Landlord Data</button>
            </div>
        </div>
    </div>
</body>
</html>