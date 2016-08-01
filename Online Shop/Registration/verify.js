function checkUserName(){

    var userName=document.getElementById('userName').value;        	
	if(userName=='' ){
		document.getElementById('lblUserName').innerHTML="Username required";
		
		return false;
	}
   
	else  {
        document.getElementById('lblUserName').innerHTML="";
        return true;
    }
}

function checkFullName(){
    var fullName=document.getElementById('fullName').value;
    if(fullName=='' ){
        document.getElementById('lblFullName').innerHTML="Fullname required";		
		return false;
	   }
       
    else{
        document.getElementById('lblFullName').innerHTML="";
        return true;
    }

}

function checkPassword(){
    var password=document.getElementById('password').value;
    if(password=='' ){
        document.getElementById('lblPassword').innerHTML="Password required";		
		return false;
	   }
       
    else   {
        document.getElementById('lblPassword').innerHTML="";
        return true;}
}




function checkConfirmPassword(){
    var password2=document.getElementById('password2').value;
    if(password2=='' ){
        document.getElementById('lblConfirmPassword').innerHTML="Password required";		
		return false;
	   }
       
    else  {
        document.getElementById('lblConfirmPassword').innerHTML="";
        return true;
    }
}

function checkEmail(){
    	var email=document.getElementById('email').value;    
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if(re.test(email)){
            document.getElementById('lblEmail').innerHTML = "";
            return true;
         }
        else{
            document.getElementById('lblEmail').innerHTML = "Invalid Email";
            return false;
            //alert('wrong email');
         }
}


function checkContact(){
    var contact=document.getElementById('contact').value;
    if(contact=='' ){
        document.getElementById('lblContact').innerHTML="Contact required";		
		return false;
	   }
       
    else   {
        document.getElementById('lblContact').innerHTML="";
        return true;
    }
}

function checkAddress(){
    var address=document.getElementById('address').value;
    if(address=='' ){
        document.getElementById('lblAddress').innerHTML="Address required";		
		return false;
	   }
       
    else   {
        document.getElementById('lblAddress').innerHTML="";
        return true;
    }
}

