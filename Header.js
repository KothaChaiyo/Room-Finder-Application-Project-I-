
//This file has all the header of website included so it can be imported to all relevant pages.

document.write(`
    <section  id="navBar">
    <div id="nav">
        <ul>
            <li><a href="#"><img src="/Images/NOSK_Logo_with_Tagline.png" alt=""></a></li>
            <li><a href="index.html">Home</a></li>
            <li><a href="#whyUs">Why Us?</a></li>
            <li><a href="#faq">FAQs</a></li>
        </ul>
    </div>
    </section>

    <div class="hidden" id="backgroundImage"></div>
    <div class="hidden" id="backgroundColor"></div>



    <!-- sidebar for mobile section  -->

    <div id="mobileNavBar">    
    <div id="main">
    <img src="./Images/NOSK_Logo_with_Tagline.png" alt="">
    <button class="openbtn" onclick="openNav()">☰</button>  
    </div>
    </div>



    <div id="mySidebar" class="mobile sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="#home" onclick="closeNav()">Home</a>
    <a href="#whyUs" onclick="closeNav()">Why Us?</a>
    <a href="#faq" onclick="closeNav()">FAQs</a>
    <!-- <a href="#">Contact</a> -->
    </div>  
`)