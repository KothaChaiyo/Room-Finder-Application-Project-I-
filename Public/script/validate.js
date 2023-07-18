


function validate(){



    const firstName = document.getElementById("fName").value;
    const  lastName= document.getElementById("lName").value;
    const  email = document.getElementById("uEmail").value;
    const  password = document.getElementById("password").value;
    const  confirmPassword = document.getElementById("rePassword").value;
    const  contact = document.getElementById("contact").value;

 

    let regName = /[a-zA-Z]{3}/;
    let regEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    let regPhone = /\d{10}/;
    let regPassword = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;

    

    let fNameErr = document.getElementById('fNameErr');
    let lNameErr = document.getElementById('lNameErr');
    let emailErr  = document.getElementById('emailErr');
    let passwordErr  = document.getElementById('passwordErr');
    let  cpasswordErr = document.getElementById('rePasswordErr');
    let contactErr = document.getElementById('contactErr');





    
    //if all the values are right , error message is not displayed
    if((regName.test(firstName) && firstName!="")){
    fNameErr.style.display = "none";
    }else{
        fNameErr.innerText = "Invalid First Name";
        fNameErr.style.display = "block";
        return false; 
    }

    if((regName.test(lastName) && lastName!="")){
        lNameErr.style.display = "none";
        }else{
            lNameErr.innerText = "Invalid Last Name";
            lNameErr.style.display = "block";
            return false; 
        }


    if(regEmail.test(email) && email!=""){
        emailErr.style.display = "none";
    
    }else{
        emailErr.innerText = "Invalid Email";
        emailErr.style.display = "block";
        return false; 
    }
    
    if(regPhone.test(contact) && contact!=""){
          contactErr.style.display = "none";
    
    }else{
        contactErr.innerText = "Invalid Contact no.";
        contactErr.style.display = "block";
        return false; 
    }

    if(regPassword.test(password) && password!=""){
        passwordErr.style.display = "none";
  
  }else{
    passwordErr.innerText = "Password must be 8 characters long with letters,numbers and special characters";
    passwordErr.style.display = "block";
    return false; 
}

  if(password==confirmPassword){
    cpasswordErr.style.display="none";
  }else{
    cpasswordErr.innerText = "Invalid First Name";
    cpasswordErr.style.display = "block";
    return false; 
}

 
return true; 
}
    


  