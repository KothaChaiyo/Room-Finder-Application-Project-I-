//getting button elements

const landLord = document.getElementById('landLord');
const tenant = document.getElementById('tenant');






//getting form elements
const password = document.getElementById('password')
const rePassword = document.getElementById('rePassword')
const fName = document.getElementById("fName")
const lName = document.getElementById("lName")
const contact = document.getElementById("contact")
const email = document.getElementById("uEmail")





// this determines the activation point of turkish button 
const OFFSET = 25;

landLord.addEventListener('focus', () => {
    getValidationInfo()
})

tenant.addEventListener('focus', () => {
    getValidationInfo()
})



//Mousr Movement Listener 
document.addEventListener('mousemove',(e) => {
   
    if(!isValid()){                 //isValid() returns true if form is valid
        turkishButton(e);
    }

})

function distanceFromCenter(boxPosition, mousePosition, boxSize){ 
    return boxPosition - mousePosition + boxSize / 2
}



// This Implements The Button

function turkishButton(e){
    const x = e.pageX
    const y = e.pageY

    
    const landLordButtonBox = landLord.getBoundingClientRect();
    const tenantButtonBox = tenant.getBoundingClientRect();

    const horizontalDistanceFromLandLord = distanceFromCenter(landLordButtonBox.x, x , landLordButtonBox.width);
    const horizontalDistanceFromTenant = distanceFromCenter(tenantButtonBox.x, x , tenantButtonBox.width);

    const verticalDistanceFromLandLord = distanceFromCenter(landLordButtonBox.y, y , landLordButtonBox.height);
    const verticalDistanceFromTenant = distanceFromCenter(tenantButtonBox.y, y , tenantButtonBox.height);


    const horizontalOffsetLandlord = landLordButtonBox.width / 2 + OFFSET
    const verticalOffsetLandlord = landLordButtonBox.height / 2 + OFFSET

    const horizontalOffsetTenant =tenantButtonBox.width / 2 + OFFSET
    const verticalOffsetTenant = tenantButtonBox.height / 2 + OFFSET


   
    


    if((Math.abs(horizontalDistanceFromLandLord) <= horizontalOffsetLandlord && Math.abs(verticalDistanceFromLandLord) <= verticalOffsetLandlord) ||  (Math.abs(horizontalDistanceFromTenant) <= horizontalOffsetTenant && Math.abs(verticalDistanceFromTenant) <= verticalOffsetTenant ) ){
        if(Math.abs(horizontalDistanceFromLandLord) <= horizontalOffsetLandlord && Math.abs(verticalDistanceFromLandLord) <= verticalOffsetLandlord){
            console.log('landlord')

            //Actions to be taken once the pointer is near the button LandLord
            
            landLord.style.visibility="hidden"
            
           
               
        }
        else{
            console.log('tenant')
            //Actions to be taken once the pointer is near the button tenant

            tenant.style.visibility="hidden"
            
        }
    }else {
        
        //Actions to be taken once the pointer is away the buttons

        landLord.style.visibility="visible"
        tenant.style.visibility="visible"
    }

}


//Function to validate email, returns true if valid email is found
function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}


//Form Validation test Case is defined here:
function validationInfo(){
    if (password.value != rePassword.value){
        return 1;
    }
    else if (password.value == '' ){
        return 2;
    }
    else if (fName.value.length<3){
        return 3;
    }else if (lName.value.length<3){
        return 4;
    }else if(!validateEmail(email.value)){
      
        return 5;
    }else if(contact.value==""){
        return 6;
    }
    else{
        console.log(email.value);
        return 200;
    } 
}

//This returns true if all the validation Requirement is met
function isValid(){
    if ((validationInfo()) == 200)
    return true;
    else return false;
}


//This function specifies why the Form is not valid 
function getValidationInfo(){
    switch (validationInfo()){
        case 1:
            alert('1 password mismatch')
            break
        case 2:
            alert('2 Empty Password')
            break
        case 3:
            alert('3 Minimum 3 characters required')
            break
        case 4:
            alert('4 Minimum 3 characters required')
            break
        case 5:
            alert('5 Please Enter a valid Email')
            break
        case 6:
             alert("Please enter your contact number")
             break 

    }
}


