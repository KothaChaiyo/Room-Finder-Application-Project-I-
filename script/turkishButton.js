// work remaining 


const landLord = document.getElementById('landLord');
const tenant = document.getElementById('tenant');






//getting form elements
const password = document.getElementById('password')
const rePassword = document.getElementById('rePassword')
const fName = document.getElementById("fName")
const lName = document.getElementById("lName")
const contact = document.getElementById("contact")
const email = document.getElementById("uEmail")





const OFFSET = 25;

landLord.addEventListener('focus', () => {
    getValidationInfo()
})

tenant.addEventListener('focus', () => {
    getValidationInfo()
})




document.addEventListener('mousemove',(e) => {
   
    if(!isValid()){
        turkishButton(e);
    }

})

function distanceFromCenter(boxPosition, mousePosition, boxSize){
    return boxPosition - mousePosition + boxSize / 2
}


function resetPosition(){
    console.log('reset')
}


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
            // landLord.style.float="right"
            
            landLord.style.visibility="hidden"
            
           
               
        }
        else{
            console.log('tenant')
            // tenant.style.float="left"
            tenant.style.visibility="hidden"
            
        }
    }else {
        // landLord.style.float="left"
        // tenant.style.float="right"
        landLord.style.visibility="visible"
        tenant.style.visibility="visible"
    }

}

function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function validationInfo(){
    var flag = 0;
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
    }
    else{
        console.log(email.value);
        return 200;
    } 
}


function isValid(){
    if ((validationInfo()) == 200)
    return true;
    else return false;

}

function getValidationInfo(){
    switch (validationInfo()){
        case 1:
            alert('1 password mismatch')
            break
        case 2:
            alert('2 Empty Password')
            break
        case 3:
            alert('3 Minium 3 characters required')
            break
        case 4:
            alert('4 Minium 3 characters required')
        case 5:
            alert('5 Please Enter a valid Email')

    }
}


function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}