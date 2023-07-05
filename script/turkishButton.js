// work remaining 


const landLord = document.getElementById('landLord');
const tenant = document.getElementById('tenant');






//getting form elements
const password = document.getElementById('password')
const rePassword = document.getElementById('rePassword')
const fName = document.getElementById("fName")
const lName = document.getElementById("lName")
const contact = document.getElementById("contact")
const email = document.getElementById("email")





const OFFSET = 25;

landLord.addEventListener('focus', () => {
    alert("Form not filled Correctly")
})

tenant.addEventListener('focus', () => {
    alert("Form not filled Correctly")
})




document.addEventListener('mousemove',(e) => {
   
    
    turkishButton(e);

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


function validationInfo(){
    var flag = 0;
    if (password.value != rePassword.value){
            return 1;
    }
    else if (password == '' ){
        return 2;
    }
    else if (fName.value.length<3){
        return 3;
    }else if (lName.value.length<3){
        return 4;
    }
}
