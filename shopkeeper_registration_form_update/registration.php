<?php
include "home_navbar.html";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="registration.css">
    <title>Registration</title>
</head>

<body>
    <div class="main">
        <div class="inside_main">


            <form action="register.php" method="post" onsubmit="validation(event)">
                <div class="form-group">

                    <input type="text" class="form-control " name="name" id="name" placeholder="Name">
                   <label for="" id="name_error" style="color:red"></label>
                    
                </div>

                <div class="form-group formcss" >
                     <input type="email" class="form-control " aria-describedby="emailHelp"
                     name="email"  id="email"  placeholder="Enter email">
                     <label for="" id="email_error" style="color:red"></label>

                </div>

                <div class="form-group">
                    <input type="password" class="form-control " name="password1" id="password1" placeholder="Password">
                    <label for="" id="password1_error" style="color:red"></label>
                </div>

                <div class="form-group">
                     <input type="password" class="form-control " name="password2" id="password2" placeholder="Confirm password">
                     <label for="" id="password2_error" style="color:red"></label>
                </div>

                <div class="sub">
                    <button type="submit" class="btn btn-primary " name="reg_submit" value=submit style="background-color: #2b6777; border-color: #2b6777;">
                        Submit
                    </button>
                </div>

        </div>

        </form>
    </div>
    <script>
        function validation(e)
        {
            const name=document.getElementById("name").value;
            const email=document.getElementById("email").value;
            const password1=document.getElementById("password1").value;
            const password2=document.getElementById("password2").value;

            const name_error=document.getElementById("name_error");
            const email_error=document.getElementById("email_error");
            const password1_error=document.getElementById("password1_error");
            const password2_error=document.getElementById("password2_error");
            let error=false;
            if(name==="")
            {
                name_error.innerHTML="Name  is required";
                error=true;
            }
            else{
                name_error.innerHTML="";
            }


            let atpos=email.indexOf('@');
            let dotpos=email.lastIndexOf('.');
            if(email==="")
            {
                email_error.innerHTML="Email required";
                error=true;
            }
            else if(atpos<4||dotpos-atpos<4||dotpos===email.length-1)
            {
                email_error.innerHTML="Invalid email";
                error=true;
            }
            else{
                email_error.innerHTML="";
            }
            if(password1==="")
            {
                password1_error.innerHTML="password is required";
                error=true;
            }
            else if(!password1.match(/[a-z]/))
            {
                password1_error.innerHTML="password must contain lower charecter";
                error=true;
            }
            else if(!password1.match(/[A-Z]/))
            {
                password1_error.innerHTML="password must contain upper charecter";
                error=true;
            }
            else if(!password1.match(/[0-9]/))
            {
                password1_error.innerHTML="password must contain one number";
                error=true;
            }
            else if(!password.match(/[@#$%&*!]/))
            {
                password1_error.innerHTML="password must contain special charecter";
                error=true;
            }
            else{
                password1_error.innerHTML="";

            
            }
            if(password2===""){
                password2_error.innerHTML="Confirm is blank";
                error=true;
            }
            else if(password1!==password2)
            {
                password2_error="password and confirm password are not same";
                error=true;
            }
            else{
                password2_error=""
            }
         
            if(error)
            {
                e.preventDefault();
            }
        }


    </script>
   


</body>

</html>