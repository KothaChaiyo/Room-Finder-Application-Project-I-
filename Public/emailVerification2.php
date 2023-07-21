<?php

session_start();

// echo $_SESSION['otp'];

$otpErr="";


if (isset($_POST['submit'])) {
    if($_POST['oneTimePassword']==$_SESSION['otp']){
        header('Location:passwordCreation.php');
    }else{
        $otpErr = "OTP Invalid";
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP page</title>
    <link rel="stylesheet" href="./style/animation.css">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/emailVerification2.css">

    <style>
        button.container-button{
                left:24%;
        }

        input#container-emailV{
            width: 80%;
    height: 8vh;
    border-radius: 8px;
    font-size: x-large;
        }



    </style>
    
    <script src="./script/index.js" defer></script>
          <!-- This includes all the Navbar and relevant heading section-->
          <script src="./script/header.js"></script>






    
</head>


 



<body>
    <div class="container hidden"><br>
        <h2 class="title-h2">Kotha Chaiyo</h2>
        <h3 class="title-h3">Ultimate Property Finder</h3><hr><br>
        <form action="" method="POST">
            <label for="container-emailV"><h2 class="container-h2">Enter OTP sent to your email:</h2></label>
            <input type="number" name="oneTimePassword" id="container-emailV" required> <p style="color:red;font-size:1.5vw"> <?php echo $otpErr; ?></p> <br>
        <button class="container-button" name="submit" type="submit">Verify</button>

        </form>

    </div>
</body>
</html>


