
<!-- Used to verify email for account creation  -->
<?php
include('config.php');

include ('header.php');


session_start();


$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$password = md5($_SESSION['password']);
$email = $_SESSION['email'];
$contact = $_SESSION['contact'];


include ('connect.php');
?>

<!-- smtp js to send email for otp verification  -->
<script src="https://smtpjs.com/v3/smtp.js"></script>

<script>
const email = "<?php echo $_SESSION['email']; ?>";
const name = "<?php echo $_SESSION['fname'];  ?>";


const otp = Math.floor(Math.random()*99999);  //generate random otp


Email.send({
    Host : "smtp.elasticemail.com",
    Username : "khatiwadasandesh01@gmail.com",
    Password : "455BDBFAC2E8D27E7AA95EE7294E885CB01C",
    To : email,
    From : "khatiwadasandesh01@gmail.com",
    Subject : "Welcome to Kotha Chaiyo",
    Body : `Hey ${name}! Welcome to Kotha Chaiyo! Your One Time Password is : ${otp}. Don't Share this password to anyone.`
})




</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP page</title>
    <link rel="stylesheet" href="./style/animation.css">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/emailVerification2.css">
    
    <script src="./script/index.js" defer></script>
          <!-- This includes all the Navbar and relevant heading section-->
          <!-- <script src="./script/header.js"></script> -->

    


    <!-- <script src="./script/verifyEmail.js"></script> -->
</head>
<body>
    <div class="container hidden"><br>
        <h2 class="title-h2">Kotha Chaiyo</h2>
        <h3 class="title-h3">Ultimate Property Finder</h3><hr><br>
        <form action="" method="post">
            <label for="container-emailV"><h2 class="container-h2">Enter OTP sent to your email:</h2></label>
            <input type="email" name="" id="otp" required><br><br> <p id="otperr" style="color:red;display:none">Invalid OTP</p>
        </form>
        <button class="container-button" id="submit" name="submit">Verify</button>
    </div>
</body>
</html>




<script defer>




const submitButton = document.getElementById("submit");
// console.log(submitButton);  

submitButton.addEventListener("click",function(event){
    event.preventDefault();

    const enteredOTP = document.getElementById("otp").value;
    const otpError = document.getElementById("otperr");

    console.log(enteredOTP,otpError);
    console.log(otp);
    
    if(otp==enteredOTP){
      
        otpError.style.display="none";

        const isValid = true;

        // Send the value of 'isValid' to a PHP script using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'verifyEmail.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            // console.log(xhr.responseText);  // Handle the response from PHP
          }
        };
        xhr.send('isValid=' + isValid);

        window.location.href = "login.php";
    }
    else{
        otpError.style.display = "block";
    }
})
</script>






<?php

// Retrieve the value of 'isValid' from the AJAX request
$isValid = isset($_POST['isValid']) ? $_POST['isValid'] : '';

// Write logic in PHP based on the value of 'isValid'
if ($isValid === 'true') {
        
    if($_SESSION["joinAs"]=="Tenant"){
    $query = "INSERT INTO tenant(name,email,password,contact) VALUES('$fname $lname','$email','$password','$contact')";
    }else if($_SESSION["joinAs"]=="LandLord"){
        $query = "INSERT INTO landlord(name,email,password,contact) VALUES('$fname $lname','$email','$password','$contact')";
    }
    
    mysqli_query($connection, $query);
       

} 



?>







