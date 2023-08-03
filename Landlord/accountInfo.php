
<?php
session_start();



if(!isset($_SESSION['lname']) || !isset($_SESSION['lemail']) || !isset($_SESSION['lcontact'])){

    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "The requested URL was not found on this server.";
    exit;

}





include 'landlordHeader.php';

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Account Information</title>
    <link rel="icon" href="../Public/Images/kothaChaiyoLogo.png">
    <!-- <link rel="stylesheet" href="../Public/style/accountInfo.css" /> -->
    <!-- <script src="../Public/script/landlordHeader.js" "defer"></script> -->



    <style>

      div.container{
        width:70vw;
        height:50vh;

        border:2px solid green;
        margin-left:5vw;
        margin-top:5vh;
        padding:10px;
        height:fit-content;
        border-radius:10px;
        box-shadow:10px 10px 10px 10px gray;
        background-color:#e3e6f1;
      }

      p.container-head{
     color: #136a49;
    font-weight: bolder;
    font-size: 3rem;
    text-align: center;
      }

      span.container-img{
        width: 50%;
       
      }

      span.container-img img{
        width:20%;
        margin-left:40%;
      }

        div.details{
          width:100%;
          text-align:center;
          font-size:2rem;
          margin-top:20px;
        }

        span.bold{
          font-weight:bolder;
        }

        
        @media screen and (max-width:1200px) {
          p.container-head{
              font-size:2.5rem;
          }

          div.details{
              font-size:1.5rem;
          }
        }


        @media screen and (max-width:900px) {
          p.container-head{
              font-size:2rem;
          }

          div.details{
              font-size:1rem;
          }

          div.container{
            margin-left:2vw;
          }
        }


        @media screen and (max-width:700px) {
          p.container-head{
              font-size:2rem;
          }

          div.details{
              font-size:1rem;
          }

          div.container{
            margin-left:10vw;
            height:60vh;
          }

        span.container-img{
        width: 50%;
       
      }

      span.container-img img{
        width:40%;
        margin-left:30%;
      }

      div.details{
        margin-top:5vh;
      }
        }


        @media screen and (max-width:500px) {
          p.container-head{
              font-size:2rem;
          }

          div.details{
              font-size:1rem;
          }

          div.container{
            margin-left:1vw;
            height:60vh;
            width:90%;
          }
  

        }



        @media screen and (max-width:360px) {
          p.container-head{
              font-size:1.5rem;
          }

          div.details{
              font-size:0.8rem;
          }

          div.container{
            margin-left:1vw;
            height:60vh;
            width:90%;
          }


        span.container-img{
        width: 50%;
       
      }

      span.container-img img{
        width:60%;
        margin-left:20%;
      }
  

        }




        @media screen and (max-width:300px) {
          p.container-head{
              font-size:5vw;
          }

          div.details{
              font-size:0.7rem;
          }

          div.container{
            height:40vh;
          }

    
  

        }


        @media screen and (max-width:200px) {
          p.container-head{
              font-size:4vw;
          }

       div.details{
        text-align:left;
        overflow:scroll;
       }

        .bold , .no-bold{
          font-size:0.2%;
        }

  
        }
      


        #accountInformation{
          color:rgb(24, 200, 133);
        }
      


    </style>
  
  </head>
  <body>
  
    <section class="main">
    <div class="container">
      <p class="container-head">Account Information</p>
      <span class="container-img"><img src="../Public/Images/username.png"  alt="images"></span><br>

      <div class="details">
      <span class="no-bold">Name:</span> <span class="container-userName bold"><?php echo $_SESSION['lname']?></span><br>
      <span class="no-bold">Email:</span> <span class="container-email bold"><?php echo $_SESSION['lemail']?></span><br>
      <span class="no-bold">Contact&phone; :</span><span class="container-contact bold"><?php echo $_SESSION['lcontact']?></span><br>
    </div>
        <br><br>
    </div>
  </section>
  </body>
</html>
