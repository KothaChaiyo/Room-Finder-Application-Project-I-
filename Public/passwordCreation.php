<?php

require('./connect.php');

$passwordErr = "";
$cpasswordErr = "";


if($_SERVER["REQUEST_METHOD"]=="POST"){
  
    
    if($_POST["password"]==""){
            $passwordErr = "Password Can't be empty";
    }else{
    if(!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',$_POST["password"])){
            $passwordErr = "Password must be at least 8 characters with letters and numbers";
    } 
    
    else if($_POST["password"]!=$_POST["confirmPassword"]){
        $cpasswordErr = "Password and Confirm Password donot match";
    }
}




}




?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PasswordVerification</title>
    <link rel="stylesheet" href="./style/animation.css">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/passwordCreation.css">
    <script src="./script/index.js" defer></script>
          <!-- This includes all the Navbar and relevant heading section-->
          <script src="./script/header.js"></script>
</head>
<body>
    <div class="container hidden"><br>
        <form action="" method="post">
            <h2 class="title-h2">Kotha Chaiyo</h2>
            <h3 class="title-h3">Ultimate Property Finder</h3><hr><br>
           <br> <label for="container-emailV"><p class="container-h2">Create New Password:</p></label>
            <input type="password" name="password" id="container-emailV" required> <p style="color:red;font-size:1.2rem;"> <?php echo $passwordErr ?></p> <br>
            <label for="container-emailV"><p class="container-h2">Confirm Password:</p></label>
            <input type="password" name="confirmPassword" id="container-emailV" required>  <p style="color:red;font-size:1.2rem;"> <?php echo $cpasswordErr ?></p> <br>
        <button class="container-button" name="submit">Finish</button>
        </form>

    </div>
</body>
</html>



<?php

if(isset($_POST['submit'])){

if($passwordErr=="" && $cpasswordErr==""){

    $password = md5($_POST["password"]);

    session_start();

        if($_SESSION["t_id"]==-1){
            //landlord;;

            $l_id = $_SESSION['l_id'];
            $query = "UPDATE landlord SET password ='$password' WHERE l_id='$l_id'";
        }


        if($_SESSION["l_id"]==-1){
            //tenant

            $t_id = $_SESSION['t_id'];
            $query = "UPDATE tenant SET password ='$password' WHERE t_id='$t_id'";
        }



       $query =  mysqli_query($connection,$query);

       if($query){
        header('Location:login.php');
        exit;
       }else{
        header("HTTP/1.0 404 Not Found");
        echo "<h1>404 Not Found</h1>";
        echo "The requested URL was not found on this server.";
       }

}

}

?>