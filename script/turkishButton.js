// work remaining 


const landLord = document.getElementById('landLord');
const tenant = document.getElementById('tenant');

landLord.addEventListener('click', () => {
    alert("Form not filled Correctly")
})

tenant.addEventListener('click', () => {
    alert("Form not filled Correctly")
})


document.addEventListener('mousemove',(e) => {
    const x = e.pageX
    const y = e.pageY


    const landLordButtonBox = landLord.getBoundingClientRect();
    const tenantButtonBox = tenant.getBoundingClientRect();

    const horizontalDistanceFromLandLord = (landLordButtonBox.x, x , landLordButtonBox.width);
    const horizontalDistanceFromTenant = (tenantButtonBox.x, x , tenantButtonBox.width);

    const verticalDistanceFromLandLord = (landLordButtonBox.y, y , landLordButtonBox.height);
    const verticalDistanceFromTenant = (tenantButtonBox.y, y , tenantButtonBox.height);


    if(Math.abs(horizontalDistanceFromLandLord) <= 100 && Math.abs(verticalDistanceFromLandLord) <=100 ){
        changePosition();
    }else {
        resetPosition();
    }


})

function distanceFromCenter(boxPosition, mousePosition, boxSize){
    return boxPosition - mousePosition + boxSize / 2
}

function changePosition(){
    console.log(verticalDistanceFromLandLord);
}

function resetPosition(){
    console.log('reset')
}