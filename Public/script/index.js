
//logic for content animation on scroll
const observer = new IntersectionObserver((entries)=>{
    entries.forEach((entry)=>{

        //If any component is intersection(visible) add class "show" else,remove it
        if(entry.isIntersecting){
            entry.target.classList.add("show");
        }else{
            entry.target.classList.remove("show");
        }
    })
});


//Select all the elements with "hidden" class and observe them
const hiddenElements = document.querySelectorAll(".hidden");
hiddenElements.forEach((el)=>{
    observer.observe(el);
});



// For faq section 

 // Get all the question elements
const questions = document.querySelectorAll('#faqContainer .question');

 // Add a click event listener to each question
 questions.forEach((question) => {
   question.addEventListener('click', (e) => {
    e.preventDefault();
         // Toggle the answer visibility
     const answer = question.nextElementSibling;
     answer.style.display = answer.style.display === 'none' ? 'block' : 'none';
   });
 });

//  Logic for opening and closing of mobile sidebar 

 function openNav() {
    //When sidebar opens, open button gets invisible
    document.querySelector(".openbtn").style.display = "none";
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.querySelector("#main img").style.display = "none";
  }
  
  function closeNav() {
  //When sidebar closes, open button comes back to visibility
   document.querySelector(".openbtn").style.display = "block";
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.querySelector("#main img").style.display = "block";

  }


