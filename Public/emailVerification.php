
<?php

require('./connect.php');
include ('header.php');


$errMessage = "";





if(isset($_POST['submit'])){


    $enteredEmail = $_POST['email'];


    $query1 = "SELECT * FROM landlord WHERE email = '$enteredEmail' ";
    $query2 = "SELECT * FROM tenant WHERE email = '$enteredEmail'";

    

    $queryL = mysqli_query($connection,$query1);
    $queryT = mysqli_query($connection,$query2);
    $countLandlord = mysqli_num_rows($queryL);
    $countTenant = mysqli_num_rows($queryT);




    if($countLandlord==1 || $countTenant==1){




            session_start();
            if($countLandlord==1){
                $array1=mysqli_fetch_assoc($queryL);
                $_SESSION['l_id']= $array1['l_id'];
                $_SESSION['email'] = $array1['email'];
                $_SESSION['t_id'] = -1;
    
                
            }
            
            if($countTenant==1){
                $array2=mysqli_fetch_assoc($queryT);
                $_SESSION['t_id']= $array2['t_id'];
                $_SESSION['email'] = $array2['email'];
                $_SESSION['l_id'] = -1;
            }
    }else{
       $errMessage="Email not registered";
    }


}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
  
    <link rel="icon" href="./Images/kothaChaiyoLogo.png">
    
    <link rel="stylesheet" href="./style/animation.css">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/emailVerification.css">
    <script src="./script/index.js" defer></script>
          <!-- This includes all the Navbar and relevant heading section-->
          <!-- <script src="./script/header.js"></script> -->
    <script src="./script/header.js"></script>


            <!-- smtp js to send email for otp verification  -->
        <script src="https://smtpjs.com/v3/smtp.js"></script>


</head>
<body>
        <div class="container hidden"><br>
            <h2 class="title-h2">Kotha Chaiyo</h2>
        <h3 class="title-h3">Ultimate Property Finder</h3><hr><br>
            <form action="" method="POST">
                <label for="container-emailV"><h2 class="container-h2">Enter your email:</h2></label>
                <input type="email" name="email" id="container-emailV" required><p style="color:red;font-size:1.5vw;"><?php echo $errMessage; ?></p>
            <button name="submit" type="submit" class="container-button">Next</button>
            </form>
         
        </div>
</body>
</html>



<?php

if(isset($_POST["submit"])){
    if($countLandlord==1 || $countTenant==1){ 

        
            $randomNumber = rand(00000, 99999); 
            $_SESSION['otp'] = $randomNumber;
           
        ?>
             <script>
           
           const email = "<?php echo $enteredEmail; ?>";
   
   
   
           const otp = <?php echo json_encode($randomNumber); ?>;  //generate random otp 
   
   
        


           Email.send({
               Host : "smtp.elasticemail.com",
               Username : "khatiwadasandesh01@gmail.com",
               Password : "", //smtpjs password goes here
               To : email,
               From : "khatiwadasandesh01@gmail.com",
               Subject : "Welcome to Kotha Chaiyo",
               Body : `Hey ! Your One Time Password is : ${otp}. Don't Share this password to anyone.`
           }).then(()=>{
            window.location.href="emailVerification2.php"
           })
             </script>
        <?php

    }
}


?>
