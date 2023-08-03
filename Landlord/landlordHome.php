
<?php
session_start();



if(!isset($_SESSION['lname']) || !isset($_SESSION['lemail']) || !isset($_SESSION['lcontact'])){

    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "The requested URL was not found on this server.";
    exit;

}





include 'landlordHeader.php';



define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'KothaChaiyo');


// Establish database connection
$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}











?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

    <title>Room Finder-Ultimate Property Finder</title>
    <link rel="icon" href="../Public/Images/kothaChaiyoLogo.png">

    <!-- <script src="../Public/script/landlordHeader.js"></script> -->
     <link rel="stylesheet" href="../Public/style/landlordHome.css">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
        <style>
            body{

            background-color:#e3e6f1;
            font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
            }


            div.containerHead {
                color:#136a49;
              
                font-weight:bolder;
                /* margin-bottom:0px; */
                /* text-shadow:0.5px 0.5px; */
                margin-left:17vw;
                margin-top:50px;   
                font-size:3rem;


            }

            #listingsHeading{
                color:#136a49;
                
          
                margin-left:27vw;
                font-weight:bolder;
                font-size:3rem;
                /* text-align:center; */


            }

            

            p#warningIcon{
                font-size:30rem;
                font-weight:bolder;
                color:#136a49;
                
                margin:0;
                padding:0;
                margin-left:22vw;
                line-height:1;

                
            }

            p#noListingsPara{
                font-size:3rem;
                /* position:relative; */
                /* bottom: 6vw; */
                margin-left:21vw;
                color:#136a49;
                font-weight:bolder;

            }



            div.recordContainer{
                
                width:90%;
                border:4px solid black;
                display:flex;
                margin:20px;

                /* border:2px solid green; */

                border-radius:10px;
        box-shadow:10px 10px 10px 10px gray;
        background-color:#e3e6f1;

        height:13vw;
        transition: box-shadow 0.3s ease;
            }


            div.recordContainer:hover{
        box-shadow:5px 5px 5px 5px gray;
        cursor:pointer;

            }


            div#imgContainer{
                width:30%;
                /* border:2px solid red; */
                padding:2px;

                display: flex;
                justify-content: center; /* Horizontally center the image */
                align-items: center;

            

              
            }

            #imgContainer img{
                width:100%;
                height:100%;
               
                /* height:100%; */
                border-radius:10px;
                max-height:100%;
                
             
            }

            div#details{
                width:70%;
                /* border : 2px solid green; */
                padding-left:20px;
                position:relative;
         

             
                
            }


            p#title{
                font-size:2rem;
                font-weight:bolder;
                overflow:hidden;
          
                
               
            }

            p#description{
                overflow:hidden;
                white-space: nowrap;
                /* border:2px solid red; */
                /* height:4vw; */
                /* margin-top:-2vw; */

            

                width:75%;
                text-overflow: ellipsis;
            }

            span#rent{
               margin-left:40%;
          
               font-weight:bolder;
               position: absolute;
               bottom:0;
           
  
            }

            span#size{
                /* margin-bottom:0; */

                font-weight:bolder;
                position:absolute;
                left:2%;
                bottom:0;
           

            }

            button.viewDetails{
                position:absolute;
                right:3%;
                bottom:5%;
               


                background-color:green;
                width:10vw;
                height:3vw;
                border:none;
                color:white;
                font-weight:bolder;
                font-size:1.3rem;

                cursor:pointer;

                border-radius:10px;
            }

            button.viewDetails:hover{
                background-color:#065706;
                }




            @media screen and (max-width:1400px) {
               div.recordContainer{
                height:15vw;
               }
               button.viewDetails{
                font-size: 1rem;
               }
               p#title{
                font-size:1.7rem;
               }

               div#imgContainer{
                width:30%;
            }

            div#details{
                width:70%;
            }
            
            }



            @media screen and (max-width:1200px) {
               div.recordContainer{
                height:17vw;
               }
               button.viewDetails{
                font-size: 0.7rem;
               }
               p#title{
                font-size:1.5rem;
               }


               div#imgContainer{
                width:40%;
               }

            div#details{
                width:60%;
            }


            p#listingsHeading{
                font-size:3rem;
                /* margin-left:30vw; */
            }

            
            }
        



            @media screen and (max-width:1100px) {
                div.containerHead{
        
                font-size:2rem;
                margin-left:13vw;
            
            }

            p#warningIcon{
                font-size:25rem;
                margin-left:15vw;
            }

            p#noListingsPara{
                font-size:2rem;
                margin-left:16vw;
            }


            p#listingsHeading{
                font-size:2rem;
                margin-left:23vw;
            }
            }



            @media screen and (max-width:1050px) {
               div.recordContainer{
                height:180px;
                width:90%;
               }
               button.viewDetails{
                width:100px;
                height:35px;
                font-size: 0.7rem;
               }

               p#description{
                margin-top:-10px;
               }

               p#title{
                font-size:1.3rem;
               }


               div#imgContainer{
                width:45%;
            }

            div#details{
                width:55%;
            }


            p#listingsHeading{
                font-size:2rem;
            }

            span#size{
                width:15vw;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            span#rent{
                word-wrap: break-word; /* Wrap the text to the next line if it exceeds the container's width */
  overflow: hidden;
            }


        
            
            }


            @media screen and (max-width:750px) {
                div.containerHead{
        
                font-size:1.7rem;
                margin-left:10vw;
            
            }

            p#warningIcon{
                font-size:25rem;
                margin-left:10vw;
            }

            p#noListingsPara{
                font-size:1.7rem;
                margin-left:14vw;
            }

            div.recordContainer{
                height:180px;
                width:95%;
               }

               #listingsHeading{
             
                
          
                margin-left:20vw;
               }

     



               p#listingsHeading{
                font-size:1.5rem;
            }


            }


            @media screen and (max-width:700px) {
                div.containerHead{
        
                text-align:center;
                margin-left:0;
            

            }

            p#listingsHeading{
                margin-left:0;
                text-align:center;
                font-size:1.7rem;
            }

            p#warningIcon{
             
                text-align:center;
                margin-left:0;
            }

            p#noListingsPara{
             
                text-align:center;
                margin-left:0;
            }


            div.recordContainer{
                height:180px;
                width:95%;
                margin-left:1vw;
               }
               button.viewDetails{
                width:15vw;
                height:35px;
                font-size: 0.5rem;
               }

               p#description{
                margin-top:-10px;
               }



               div#imgContainer{
                width:40%;
            }

            div#details{
                width:60%;
                /* min-width:100px; */
            


            }


            @media screen and (max-width:550px) {
                div.containerHead{
        
               
                font-size:1.5rem;
            

            }

            p#warningIcon{
             
                text-align:center;
                margin-left:0;
                font-size:20rem;
            }

            p#noListingsPara{
             
                text-align:center;
                margin-left:0;
                font-size:1.5rem;

            }

            div.recordContainer{
                width:95%;
                margin-left:2px;
            }


            button.viewDetails{
                width:15vw;
                height:30px;
                font-size:0.2rem;
                bottom:20px;
               }

               div#imgContainer{
                width:50%;
               }

               div#details{
                width:50%;
               }


           
            div#imgContainer img{
                    height: 100%;
                    width:100%;
            }

      


            }

            @media screen and (max-width:500px) {
                button.viewDetails{
                    width:17vw;
                }

                span#rent,span#size{
                    font-size:0.8rem;
                }
            }



            @media screen and (max-width:400px) {
                div.containerHead{
        
               
                font-size:5vw;
            

            }

            p#warningIcon{
             
                text-align:center;
                margin-left:0;
                font-size:100vw;
            }

            p#noListingsPara{
             
                text-align:center;
                margin-left:0;
                font-size:5vw;
                

            }

            button.viewDetails{
                    width:20vw;
                    bottom:20px;
                    
                }

                span#rent,span#size{
                    font-size:0.5rem;
                }

                p#listingsHeading{
                    font-size:1.4rem;
                }
            }



        </style>
<body>

<section class="main">


<div class="containerHead">Welcome,<?php echo $_SESSION['lname']."!";?> <i class="fa fa-fw fa-user"></i>  </div>






<?php




$email = $_SESSION['lemail'];
$query1 = "SELECT l_id FROM landlord WHERE email='$email' ";

$q1 = mysqli_query($connection,$query1);
$array=mysqli_fetch_assoc($q1);
$_SESSION['l_id']= $array['l_id'];

$landlordId = $_SESSION['l_id'];



$query2 = "SELECT * FROM property WHERE l_id = '$landlordId'";

$q2 = mysqli_query($connection,$query2);




if(mysqli_num_rows($q2)==0){
    echo "<p id='warningIcon'>&#x26A0;</p>";
    echo "<p id='noListingsPara'>You have no listings yet</p>";
    
}

else{

    echo "<p id='listingsHeading'> Your Listings </p>";
    
    while ($row = mysqli_fetch_assoc($q2)) {


?>
 <div class="recordContainer" >
            <div id="imgContainer"> <?php
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image1']) . '" />';  ?>
            </div id="imgContainer">

            <div id="details">
                <p id="title"> <?php echo $row['title'] ?> </p>
                <p id="description"><?php echo $row['description'] ?></p>
                <span id="size">&#128719;<?php  echo $row['size']   ?></span>
                <span id="rent">&#8377;<?php  echo $row['rent']   ?></span>

                <button class="viewDetails" id="<?php echo $row['p_id']  ?>">View Details</button>
            </div>


    </div>



                

                

<?php
    // echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image1']) . '" />';
    // echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image2']) . '" />';
    // echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image3']) . '" />';
    // echo '<p>' . $row['description'] . '</p>';
    // echo '<p>Location: ' . $row['location'] . '</p>';
    // echo '<p>Size: ' . $row['size'] . '</p>';
    // echo '<p>Rent: ' . $row['rent'] . '</p>';

        // Display other fields as needed

        
    // echo '</div>';
//     while ($row = mysqli_fetch_assoc($q2)) {
//         echo "PID: " . $row['p_id'] . "<br>";
//         echo "Title: " . $row['title'] . "<br>";
//         echo "Description: " . $row['description'] . "<br>";
//         echo "Location: " . $row['location'] . "<br>";
//         echo "<hr>"; // Add a horizontal line to separate records
// }

}


}


?>
    

    </section>


    <script>
    
            const button = document.querySelectorAll(".viewDetails");
            console.log(button);

    
        button.forEach(button => {

            button.addEventListener("click",()=>{
     const buttonId = button.id;
    console.log(buttonId); 

                       document.cookie = `p_id=${buttonId}; expires=Thu, 01 Jan 2024 00:00:00 UTC; path=/`;
                    window.location.href = "propertyInfo.php";


            })

  });

        
    </script>
    

</body>
</html>