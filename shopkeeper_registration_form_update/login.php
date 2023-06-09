<?php
include "home_navbar.html";

?>

<?php
include "db_conn.php";

?>

<!-- <!DOCTYPE html>
<html>

<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style-forget.css">
</head>

<body style="background-color:grey;">
	
</body>

</html> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <!-- <link rel="stylesheet" type="text/css" href="style-forget.css"> -->

    <title>login</title>
</head>

<body>
    <div class="main">
        <div class="inside_main">


            <form action="loginvalidation.php" method="post">
		<h2>LOGIN</h2>
		<?php if (isset($_SESSION['smsg'])) { ?>
            <p class="success">
                <?php
                echo $_SESSION['smsg'];
                unset($_SESSION['smsg']);
				
                ?>

            </p>
        <?php } ?>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<!-- <label>Email</label> -->
		<input type="email" name="uname" placeholder="email" class="form-control"><br>

		<!-- <label>Password</label> -->
		<input type="password" name="password" placeholder="Password"  class="form-control"><br>
        <div>
                 <select name="catagory_user" class="input form-control " id="catagory">
                        <option value="">--Catagory--</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                        <option value="shopkeeper">Shopkeeper</option>
                    </select>
                    <label for="" id="catagory_error" class="error"></label>

                </div>
        <div class="col text-center">
		<button type="submit" class="btn btn-primary mx-auto" style="background-color:#2b6777;">Login</button><br>
		<a href="signup.php" class="ca" style="color:#2b6777;">Create an account</a> |
		<a href="forgot_password.php" class="ca" style="color:#2b6777;">Forget Password</a>
        </div>
	</form>
    </div>
    <script>
        function validation(e)
        {
            const email=document.getElementById("email").value;
            const password=document.getElementById("password").value;
            const catagory=document.getElementById("catagory").value;

            const email_error=document.getElementById("email_error");
            const password_error=document.getElementById("password_error");
            const catagory_error=document.getElementById("catagory_error");
            let error=false;

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
            // if(password==="")
            // {
            //     password_error.innerHTML="password is required";
            //     error=true;
            // }
            // else if(!password.match(/[a-z]/))
            // {
            //     password_error.innerHTML="password must contain lower charecter";
            //     error=true;
            // }
            // else if(!password.match(/[A-Z]/))
            // {
            //     password_error.innerHTML="password must contain upper charecter";
            //     error=true;
            // }
            // else if(!password.match(/[0-9]/))
            // {
            //     password_error.innerHTML="password must contain one number";
            //     error=true;
            // }
            // else if(!password.match(/[@#$%&*!]/))
            // {
            //     password_error.innerHTML="password must contain special charecter";
            //     error=true;
            // }
            // else{
            //     password_error.innerHTML="";

            // }
            if(catagory==="")
            {
                catagory_error.innerHTML="choose one catagory";
                error=true;
            }
            else{
                catagory_error.innerHTML="";
            }
            if(error)
            {
                e.preventDefault();
            }
        }


    </script>
   

</body>

</html>