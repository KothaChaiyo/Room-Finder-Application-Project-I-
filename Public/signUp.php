<?php
    
include 'connect.php';

include ('header.php');


$fname =$lname= $email = $password=$cpassword=$contact="";

$fNameerr = $lNameErr = $emailErr=$passwordErr= $cpasswordErr=$contactErr="";

if ($_SERVER['REQUEST_METHOD'] == "POST") {




    if (($_POST['fName'])=="") {
        $fNameErr = "First name cant be empty";
    } else {
        $fname = input_data($_POST['fName']);
        if (!preg_match('/[a-zA-Z]/', $lname)) {
            $fNameErr = "name format mismatch";
        }
    }


    if (($_POST['lName'])=="") {
        $lNameErr = "Last name cant be empty";
    } else {
        $lname = input_data($_POST['lName']);
        if (!preg_match('/[a-zA-Z]/', $lname)) {
            $lNameErr = "name format mismatch";
        }
    }


    //Email validation

    $Email = $_POST['email'];

    $query1 = "select * from landlord where email ='$Email'";
    $query2 = "select * from tenant where email ='$Email'";
    $queryL = mysqli_query($connection,$query1);
    $queryT = mysqli_query($connection,$query2);
    $countLandlord = mysqli_num_rows($queryL);
    $countTenant = mysqli_num_rows($queryT);
    

    if($countLandlord!=0 || $countTenant!=0){
        $emailErr = "Email already taken";
        // echo "<script>document.write(`Email already taken`)</script>";
    }else{
        $emailErr = "";
    }

    if (($_POST['email'])=="") {
        $emailErr = "Email cant be empty";
    }  else {
        $email = input_data($_POST["email"]);
        if (!preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $email)) {
            $emailErr = "email format mismatch";
    }
    }



    //Password validation
    if (($_POST['password'])=="") {
        $passwordErr = "Password empty";
    } else{
        $password = input_data($_POST["password"]);
        if(!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',$password)){
            $passwordErr = "password format mismatch";
        }
    }


    //Confirm Password Validation

    if($_POST["password"]!=input_data($_POST["rePassword"])){
        $cpasswordErr = "Confirm Password and Password donot match";
    }



    if (($_POST['contact'])=="") {
        $contactErr = "Contact cant be empty";
    }  else {

        $contact = input_data($_POST["contact"]);
        if (!preg_match('/^\d{10}$/', $contact)) {
            $contactErr = "Contact no. format mismatch";
    }
    }

}

function input_data($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>

    <!--LINK-->
    <link rel="icon" href="Images/NOSK_Logo_with_Tagline.png">

    <!-- for general styling of components  -->
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/signUp.css">

    <!-- for animation of components -->
    <link rel="stylesheet" href="./style/animation.css">
    <script src="./script/index.js" defer></script>
    <script src="./script/validate.js" defer></script>
    <script defer src="script\turkishButton.js"></script>
  

    <style>
        #backgroundColor, #backgroundImage{
            background-size: cover;
        }

    </style>
</head>
<body style="background-image: url('Images\homeBackground.jpg'); background-repeat: no-repeat; background-attachment: fixed; ">


    <!-- This includes all the Navbar and relevant heading section-->
    <!-- <script src="./script/header.js"></script> -->

    <div class="signUpContainer">
            <form action="" method="POST" id="signUpForm" onsubmit="return validate();">
                <h3 class=".formLabel">Sign Up!!</h2>
                <hr>
                <label for="fName" class="formLabel">First name:</label><br>
                <input type="text" id="fName" name="fName" class="inputTextFelid"><br> <p style="color:red; font-size:1.5rem;" id="fNameErr"></p> 
                <label for="lName" class="formLabel">Last name:</label><br>
                <input type="text" id="lName" name="lName" class="inputTextFelid"><br>   <p style="color:red; font-size:1.5rem;" id="lNameErr"></p> 
                <label for="uEmail" class="formLabel">Email:</label><br>
                <input type="email" id="uEmail" name="email" class="inputTextFelid"><br>   <p style="color:red; font-size:1.5rem;" id="emailErr"></p> <p style="color:red;font-size:1.5rem"><?php echo $emailErr ?></p>
                <label for="password" class="formLabel">Create a password:</label><br>
                <input type="password" name="password" id="password" class="inputTextFelid"><br>   <p style="color:red; font-size:1.5rem" id="passwordErr"></p> 
                <label for="rePassword" class="formLabel">Re Enter your password:</label><br>  
                <input type="password" name="rePassword" id="rePassword" class="inputTextFelid"><br>   <p style="color:red; font-size:1.5rem" id="rePasswordErr"></p> 
                <label for="contact" class="formLabel">Contact No:</label><br>
                <input type="number" name="contact" id="contact" class="inputTextFelid"><br>    <p style="color:red; font: size 1.5rem;" id="contactErr"></p> 
                    <h4>Join As:</h4>
                    <!-- <input type="radio" id="joinChoice1" name="joinAs" value="LandLord" />
                    <label for="joinChoice1">LandLord</label>

                    <input type="radio" id="contactChoice2" name="joinAs" value="Tenant" />
                    <label for="joinChoice2">Tenant</label> -->
                    <input type="submit" form="signUpForm" name="submit" value="LandLord" class="inputButton" id="landLord"></input>
                    <input type="submit" form="signUpForm" name="submit" value="Tenant" class="inputButton" id="tenant"></input>    

            </form>
    </div>

    
</body>
</html>





<?php





   


if(isset($_POST["submit"])){


if ($fNameerr == "" && $lNameErr == "" && $passwordErr == "" && $cpasswordErr =="" && $contactErr== "" && $emailErr=="")
{
  
    
$fname = $_POST["fName"];
$lname = $_POST["lName"];

$email = $_POST["email"];
$password = $_POST["password"];
$contact = $_POST['contact'];
$joinAs = $_POST['submit'];



session_start();


    $_SESSION["fname"] = $fname;
    $_SESSION["lname"] =$lname;
    $_SESSION["email"] = $email;
    $_SESSION["password"] = $password;
    $_SESSION["contact"] = $contact;
    $_SESSION["joinAs"] = $joinAs;

    header('Location:verifyEmail.php');
    exit();

}

    }






?>
