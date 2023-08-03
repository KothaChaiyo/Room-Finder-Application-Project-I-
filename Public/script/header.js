document.write(`


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    


    <style>

   @media screen and (max-width:1500px){
    #nav ul li a img {
    height: 7vw;
     }
   }

   @media screen and (max-width:950px){
    #nav ul li a img {
    height: 10vw;
     }
   }




@media screen and (max-width:650px){
    div#mobileNavBar #main img {
    width: 9vw;
     }

}  

@media screen and (max-width:500px){
    div#mobileNavBar #main img {
    width: 11vw;
     }

}  
    </style>
</head>
<body>
<section  id="navBar">
    <div id="nav">
        <ul>
            <li><a href="#"><img src="./Images/kothaChaiyoLogo.png" style="margin-top:-1.8rem;" alt=""></a></li>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./index.php#whyUs">Why Us?</a></li>
            <li><a href="./index.php#faq">FAQs</a></li>
        </ul>
    </div>
    </section>

    <div  class="hidden" id="backgroundImage"></div>
    <div  class="hidden" id="backgroundColor"></div>



    <!-- sidebar for mobile section  -->

    <div id="mobileNavBar">    
    <div id="main">
    <img src="./Images/kothaChaiyoLogo.png" alt="">
    <button class="openbtn" onclick="openNav()">☰</button>  
    </div>
    </div>



    <div id="mySidebar" class="mobile sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="./index.php" onclick="closeNav()">Home</a>
    <a href="./index.php#whyUs" onclick="closeNav()">Why Us?</a>
    <a href="./index.php#faq" onclick="closeNav()">FAQs</a>
    <!-- <a href="#">Contact</a> -->
    </div>  
</body>
</html>

`);

