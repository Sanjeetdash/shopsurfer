<?php

include "db_conn.php";
session_start();

if (
	isset($_POST['uname']) && isset($_POST['password'])
	&& isset($_POST['email']) && isset($_POST['re_password'])&& isset($_POST['catagory_user'])) 
{

	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$email = validate($_POST['email']);
	$token = bin2hex(random_bytes(15));

	$user_data = 'uname=' . $uname;


	if (empty($uname)) {
		header("Location: signup.php?error=User Name is required&$user_data");
		exit();
	} else if (empty($pass)) {
		header("Location: signup.php?error=Password is required&$user_data");
		exit();
	} else if (empty($re_pass)) {
		header("Location: signup.php?error=Re Password is required&$user_data");
		exit();
	} else if (empty($email)) {
		header("Location: signup.php?error=Email is required&$user_data");
		exit();
	} else if ($pass !== $re_pass) {
		header("Location: signup.php?error=The confirmation password  does not match&$user_data");
		exit();
	} else {

		// hashing the password
		$pass = md5($pass);

		$sql = "SELECT * FROM users WHERE user_name='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			$_SESSION['umsg'] = "The username is taken try another. ";
			header("Location:signup.php");
			exit();
		} else {
			$category=$_POST['catagory_user'];
			$sql2 = "INSERT INTO users(user_name, password, email,token,category) VALUES('$uname', '$pass', '$email','$token','$category')";
			$result2 = mysqli_query($conn, $sql2);
			if ($result2) {
				$_SESSION['smsg'] = "Your account has been created successfully. ";

				if($category=='user')
				{
						header("Location:home.php");	
					
				}
				if($category=='shopkeeper')
				{
					$_SESSION['email']=$email;
				
					header("Location:shopkeeper_registration.php");	
				}
				
				exit();
			} else {
				$_SESSION['umsg'] = "unknown error occurred. ";
				header("Location:signup.php");
				
				exit();
			}
		}
	}
} else {
	header("Location: signup.php");
	exit();
}
