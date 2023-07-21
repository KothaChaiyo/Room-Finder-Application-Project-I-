<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body{
    font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
}

.sidebar {
  height: 100%;
  width: 15vw;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  /* background-color: rgb(6, 150, 95); */
  /* background-color: #7cb1e7; */
  /* background-color: #18C885; */
  background-color: #053367;

  /* background-color: rgb(197, 222, 243); */

  overflow-x: hidden;
  padding-top: 16px;

}

.sidebar a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 1.1rem;
  color: white;
  display: block;
  font-weight: bolder;
  margin-top: 20px;
  
}


.sidebar a:hover {
  color: #f1f1f1;
  /* background-color: #18C885; */
  color:#18C885;
}

.main {
  margin-left: 15vw; /* Same as the width of the sidenav */
  /* padding: 0px 10px; */
}

p#copyrightText{
    position: absolute;
    left: 1.5vw;
    bottom: 15px;
    color: white;
    font-weight: bolder;
    font-size: 1rem;
}


/* mobile sidebar css begins  */

.sbar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 3;
  top: 0;
  left: 0;
  background-color:#053367;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sbar a {



  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 1.1rem;
  color: white;
  display: block;
  font-weight: bolder;
  margin-top: 20px;
  
}



.sbar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 12px;
  border-radius:3px;

  cursor: pointer;
  background-color:white;
  color: #053367;
  padding: 12px 15px;
  border: none;
}



#btn {
  transition: margin-left .5s;
  /* padding: 16px; */
  background-color: #053367;
  height: 2.5rem;
  border-radius: 5px;
 
}


#open{
    margin:1px;
}

#mobileSidebar, #btn{
    display: none;
}



@media screen and (max-width:700px){
    #mobileSidebar, #btn{
    display: block;
}
}
/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sbar {padding-top: 15px;}
  .sbar a {font-size: 18px;}
}

#copyrightTextMobile{
    color:white;
    position:absolute;
    top:95vh;
    left:50px;
    font-weight: bolder;
    font-size: 10.5px;
}

/* mobile sidebar css ends  */







@media screen and (max-width:1700px){
.sidebar a , p#copyrightText{
    font-size:15px;
}
}

@media screen and (max-width:1450px){
.sidebar a , p#copyrightText{
    font-size: 15px;
}
}


@media screen and (max-width:1250px){
.sidebar a , p#copyrightText{
    font-size: 13px;
}

}

@media screen and (max-width:1100px){

.sidebar{
    width:18vw
}

.main{

    margin-left: 18vw;

}

}

@media screen and (max-width:900px){



.sidebar a , p#copyrightText{
    font-size: 11px;
}

}


@media screen and (max-width:800px){

.sidebar{
    width:20vw
}

.main{

    margin-left: 20vw;

}

.sidebar a , p#copyrightText{
    font-size: 10.5px;
}

}

@media screen and (max-width:700px){
.mobileSidebar{
    display: block;
}

.sidebar{
    display: none;
}
.main{
    margin-left: 2vw;
}
}



</style>
</head>
<body>

<div class="sidebar">
  <a href="./landlordHome.php" id="home"><i class="fa fa-fw fa-home"></i> Home</a>
  <a href="./addListing1.php" id="addListing"><i class="fa fa-fw fa-plus"></i>Add Listing</a>
  <a href="./accountInfo.php" id="accountInformation"><i class="fa fa-fw fa-user"></i>Account Information</a>
  <a href="../Public/logout.php" id="logOut"><i class="fa fa-fw fa-sign-out"></i> Log Out</a>
  
  <p id="copyrightText">&copy; 2023 Kotha Chaiyo</p>
</div>


<!-- mobile sidebar html begins  -->
<div id="mobileSidebar" class="sbar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="./landlordHome.php"><i class="fa fa-fw fa-home"></i> Home</a>
    <a href="./addListing1.php"><i class="fa fa-fw fa-plus"></i>Add Listing</a>
    <a href="./accountInfo.php"><i class="fa fa-fw fa-user"></i>Account Information</a>
    <a href="../Public/logout.php"><i class="fa fa-fw fa-sign-out"></i> Log Out</a>
    <p id="copyrightTextMobile">&copy; 2023 Kotha Chaiyo</p>
  </div>
  
  <div id="btn">
    <button class="openbtn" id="open" onclick="openNav()">☰ </button>  
    
  </div>

<!-- mobile sidebar html ends  -->








<!-- mobile sidebar script begins  -->

<script>
    function openNav() {
      document.getElementById("mobileSidebar").style.width = "250px";
      document.getElementById("open").style.display = "none";
    }
    
    function closeNav() {
      document.getElementById("mobileSidebar").style.width = "0";
      document.getElementById("open").style.display= "block";
    }
    </script>


<!-- mobile sidebar script ends  -->


<script>

</script>
     
</body>
</html>
