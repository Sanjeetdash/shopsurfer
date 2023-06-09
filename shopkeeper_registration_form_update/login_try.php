<?php
include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style_login.css?v=2">
</head>
<body>
	<div class="login-box">
		<h2>Login</h2>
		<form id="login-form" method="post" onsubmit="validateForm()" >
			<label for="username">Email Id</label>
			<input type="text" id="username" name="username" required>
			<label for="password">Password</label>
			<input type="password" id="password" name="password" required>
			<input type="submit" value="Login" name="submit">
      <a href="forgot_password.php">forgot password?</a>
		</form>
	</div>

	<script>
        function validateForm() {
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  var option = document.getElementById("option").value;
  var errorMessage = "";

  if (username == "") {
    errorMessage += "Please enter a username.\n";
  }

  if (password == "") {
    errorMessage += "Please enter a password.\n";
  }

  if (errorMessage != "") {
    alert(errorMessage);
    return false;
  }
}

    </script>
</body>
</html>

<?php

if(isset($_POST['submit'])){
    $name = $_POST['username'];
    $password = $_POST['password'];

    echo "$name";
    echo "$password";

$qry = "SELECT * FROM shop_owner WHERE email='$name' AND password='$password'";
$result = mysqli_query($con,$qry);

$res = mysqli_fetch_assoc($result);


if ($result->num_rows > 0) {

  session_start();
$shop_id = $shop_id = $res['id'];

// Store the primary key in a session variable
$_SESSION['shop_id'] = $shop_id;

// Redirect to the menu page along with the primary key
header("Location: shopowner_profile.php");
  exit();
} else {
  // Email and password do not match, display error message
  echo "Incorrect email or password";
}
}
?>


