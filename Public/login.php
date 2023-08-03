<?php
session_start();
include('header.php');
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
 
    <link rel="icon" href="./Images/kothaChaiyoLogo.png">

    
    <link rel="stylesheet" href="./style/animation.css">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/login.css">
    <script src="./script/index.js" defer></script>
          <!-- This includes all the Navbar and relevant heading section-->
          <!-- <script src="./script/header.js"></script> -->
    <script src="./script/header.js"></script>



</head>

<body>

    <body>
            

        <div class="container-form hidden">
            <h2>Kotha Chaiyo</h2>
            <h3>Ultimate Property Finder</h3>
            <form action=" <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

                <hr><br>
                <label for="form-name">
                    <p>Email:</p>
                </label>
                <input type="email" name="email" id="form-name"><br><br>
                <label for="form-pass">
                    <p>Password:</p>
                </label>
                <input type="password" name="password" id="form-pass" placeholder=""><br>
                <p id="parav" style="color: red;font-weight:bolder;font-family:sans-serif;"></p>
                <br><button type="submit" name="submit">Login</button>
                <p id="forget-pass" ><a href="./emailVerification.php">Forgot Password?</a></p><br>
                <p id="sign-up" >Don't have an account? <a href="./signUp.php">Sign up?</a></p>
            </form>

        </div>
    </body>

</html>
<?php
include 'connect.php';
if (isset($_POST['submit'])) {
    $Email = $_POST['email'];
    $Pass = $_POST['password'];
    $pass_hash = md5($Pass);

    $query1 = "select * from landlord where email ='$Email' and password ='$pass_hash'";
    $query2 = "select * from tenant where email ='$Email' and password ='$pass_hash'";
    $query3 = "select * from admin where email = '$Email' and password = '$pass_hash'";


    $queryL = mysqli_query($connection,$query1);
    $queryT = mysqli_query($connection,$query2);
    $queryA = mysqli_query($connection,$query3);



    $countLandlord = mysqli_num_rows($queryL);
    $countTenant = mysqli_num_rows($queryT);
    $countAdmin = mysqli_num_rows($queryA);

    if($countLandlord==1||$countTenant==1 || $countAdmin==1 ){
    if ($countLandlord==1) {
        $array=mysqli_fetch_assoc($queryL);
        $_SESSION['lname']= $array['name'];
        $_SESSION['lemail']= $array['email'];
        $_SESSION['lcontact']= $array['contact'];
        
        header("Location:../Landlord/landlordHome.php");
        exit();
        // } 
       
        } 
        else {
                echo "<script>";
                echo "document.getElementById('parav').innerHTML='<br>Incorrect credentials !!!'";
                echo "</script>";
                
         }
    
    }
    if ($countTenant==1) {
        $array=mysqli_fetch_assoc($queryT);
        $_SESSION['tname']= $array['name'];
        $_SESSION['temail']= $array['email'];
        $_SESSION['tcontact']= $array['contact'];
        header("Location:../Tenant/tenantHome.php");
        exit();
        // } 
       
        } 
        else {
                echo "<script>";
                echo "document.getElementById('parav').innerHTML='<br>Incorrect credentials !!!'";
                echo "</script>";
                
         }

         if($countAdmin==1){

            $array=mysqli_fetch_assoc($queryA);
            $_SESSION['aemail']= $array['email'];
            $_SESSION['acontact']= $array['contact'];
            header("Location:../Admin/landing.php");
            exit();
        }else {
            echo "<script>";
            echo "document.getElementById('parav').innerHTML='<br>Incorrect credentials !!!'";
            echo "</script>";
        }
    
    }

 
        
 

?>