<?php

session_start();

if(!isset($_SESSION['tname']) || !isset($_SESSION['temail']) || !isset($_SESSION['tcontact'])){

    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "The requested URL was not found on this server.";
    exit;

}

include 'tenantHeader.php';




define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'KothaChaiyo');

define('PASSWORD','Barcelonist');



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
   
    <title>Kotha Chaiyo-Ultimate Property Finder</title>
    <link rel="icon" href="../Public/Images/kothaChaiyoLogo.png">
    <link rel="stylesheet" href="../Public/style/tenantHome.css">
    <!-- <script src="../Public/script/tenantHeader.js"></script> -->

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <style>


div.searchContainer{
    /* background-color:red; */
    height:150px;



}

div.searchContainer input{
    width:30rem;
    height:3rem;
    margin-top:40px;
    margin-left:26vw;
    border-radius:10px;
    /* border:none; */
    font-weight:bolder;
    font-size:1rem;
    margin-right:0;
    text-align:center;

}

div.searchContainer button{
    height:3rem;
    width:7vw;
    border:none;
    border-radius:10px;
    font-size:1rem;
    font-weight:bolder;
    background-color:green;
    color:white;
    cursor:pointer;
    

}


p#notFound{
    color:red;  
    font-size:2rem;
    text-align:center;
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
               margin-left:60%;
          
               font-weight:bolder;
               position: absolute;
               bottom:0;
           
            }

            span#location{
                margin-left:30%;
                font-weight:bolder;
                position:absolute;
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


            div#paginationDiv{
                   
           
                height: 7vh;
                margin-top:100px;


                display: flex;
  justify-content: center; /* Horizontally center the items */
  align-items: center;
           

                }

                a.pageLink{
                    color:white;
                    background-color:green;
                    width:4vw;
                    text-align:center;
                    text-decoration:none;
                  
                    height:70%;
                    font-weight:bolder;
                    padding-top:20px;
                    margin-left:1px;   
                }


            @media screen and (max-width:1600px){
                p#title{
                    font-size:1.7rem;
                }
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

            div.searchContainer input{
                margin-left:20vw;
            }
            button#search{
                    width:10vw;

            }
            
            }



            @media screen and (max-width:1200px) {
               div.recordContainer{
                height:17vw;
               }
               button.viewDetails{
                font-size: 0.7rem;
                bottom:30px;
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


            span#rent,span#size,span#location{
    
            font-size:0.5vw;
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

        div.searchContainer input{
            margin-left:10vw;
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

            span#rent{
                margin-left:70%;
            }



            div.searchContainer input{
                margin-left:8vw;
            }
            button#search{
                    width:13vw;

            }

            a.pageLink{
                  
                    width:7vw;
                    height:5vw;
                    text-align:center;
                    padding-top:0px;
                    
                  
                }



        
            
            }

            @media screen and (max-width:900px){

            span#rent,span#size,span#location{
    
            /* background-color:red; */
            width:12vw;
            overflow: hidden; /* Hide any content that overflows the container */
  text-overflow: ellipsis
                }
            }


            @media screen and (max-width:850px){
                div.searchContainer input{
                margin-left:10vw;
                width:50vw;
            }
            button#search{
                    width:15vw;

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


            div.searchContainer input{
                margin-left:5vw;
                width:50vw;
            }
            button#search{
                    width:20vw;

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


            div.searchContainer input{
                margin-left:5vw;
                width:65vw;
            }
            button#search{
                    width:20vw;

            }


            a.pageLink{
                  
                  width:10vw;
                  height:7vw;
                  text-align:center;
                  padding-top:0px;
                  
                
              }


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
                bottom:30px;
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

            span#rent, span#location, span#size{
                font-size:0.5rem;
            }



            a.pageLink{
                  
                  width:10vw;
                  height:8vw;
                  text-align:center;
                  padding-top:0px;
                  
                
              }

      


            }

            @media screen and (max-width:500px) {
                button.viewDetails{
                    width:17vw;
                }

                span#rent,span#size,span#location{
                    font-size:0.3rem;
                }

                div.searchContainer input , div.searchContainer button{
                    font-size:1rem;
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

                span#rent,span#size,span#location{
                    font-size:0.1rem;
                }

                p#listingsHeading{
                    font-size:1.4rem;
                }




            button.viewDetails{
                    width:17vw;
                }

                span#rent,span#size,span#location{
                    font-size:0.1rem;

                }

                div.searchContainer input , div.searchContainer button{
                    font-size:0.3rem;
                   

                }

                div.searchContainer input{
                    width:50vw;
                }

                div.searchContainer button{
                    width:30vw;
                }

                div#details{
                  overflow:scroll;
                }


                a.pageLink{
                  
                  width:15vw;
                  height:10vw;
                  text-align:center;
                  padding-top:0px;

              }





            }


            @media screen and (max-width:200px) {
                div.searchContainer input{
                    width:45vw;
                }
                div.searchContainer button{
                    width:30vw;
                    font-size:0.1rem;
                }
            }







    </style>
 
</head>

<body>

<section class="main">

<div class="searchContainer">
    <form action="tenantHome.php" method="get">
    <input type="text" id="location" name="location" placeholder="Search by Location...">
     <button type="submit" id="search">Search</button>
     </form>
</div>


<?php

$listingsPerPage = 10;

// Get the current page number from the query string, default to 1 if not provided
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the starting index for the results in the database query
$startingIndex = ($current_page - 1) * $listingsPerPage;



if (isset($_GET['location'])) {
    $location = $_GET['location'];

    // Perform the database query
    $query = "SELECT * FROM property WHERE location LIKE '%$location%' LIMIT $listingsPerPage OFFSET $startingIndex";
    $countquery = "SELECT * FROM property WHERE location LIKE '%$location%'";
}else{
    $query = "SELECT * FROM property LIMIT $listingsPerPage OFFSET $startingIndex";
    $countquery = "SELECT * FROM property";

}
    $result = mysqli_query($connection,$query);

    $countResult = mysqli_query($connection,$countquery);

    $totalResults=0;
    while($crow = mysqli_fetch_assoc(($countResult))){
       $totalResults++;
    }



     // Get the total number of results to calculate the total number of pages

  
    



    // Calculate the total number of pages
    $totalPages = ceil($totalResults / $listingsPerPage);



    



    

    if (mysqli_num_rows($result) > 0) {


        // Display the search results
        while ($row = mysqli_fetch_assoc($result)) {
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
                <span id="location"><i class="fa fa-map-marker"></i>   <?php echo $row['location'] ?></span>

                <button class="viewDetails" id="<?php echo $row['p_id']  ?>">View Details</button>
        </div>


    </div>

    <?php




        }

            // Display pagination links
       echo "<div id='paginationDiv'>";


       if($totalPages<=10){

    
       for ($i = 1; $i <= $totalPages; $i++) {
           echo "<a class='pageLink' href='tenantHome.php?page=$i'>$i</a> ";
           
       }
       echo "</div>";

    }else{

        $nextPage = $current_page+1;
        for ($i = 1; $i <= 10; $i++) {
            echo "<a class='pageLink' href='tenantHome.php?page=$i'>$i</a> ";
            
        }

        echo "<a class='pageLink' href='tenantHome.php?page=$nextPage'>&raquo;</a> ";
        echo "</div>";
    }

    } else {
        echo "<p id='notFound'>No properties found in the specified location.</p>";
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