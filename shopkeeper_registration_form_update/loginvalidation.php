<?php

include "db_conn.php";
include "connection.php";

if(isset($_POST['uname']) && isset($_POST['password'])){
	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
	$category=$_POST['catagory_user'];

	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
		exit();
	} else if (empty($pass)) {
		header("Location: index.php?error=Password is required");
		exit();
	} else {
		// hashing the password
		$pass = md5($pass);


		$sql = "SELECT * FROM users WHERE email='$uname' AND password='$pass'";	

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			if ($row['email'] === $uname && $row['password'] === $pass && $row['status']== 0&& $row['category']==$category ) {


				if($category==='user')
				{
					session_start();
					$email=$res['email'];
					$_session['email']=$email;
					header('location:home.php');
				}
				if($category==='shopkeeper')
				{
					$sql="select * from `shop_owner` where email='$uname'";
					$result=mysqli_query($con,$sql);
					$res=mysqli_fetch_assoc($result);
					$num=mysqli_num_rows($result);
					if($num==1)
					{
						session_start();
						$shop_email = $res['email'];
						$_SESSION['shop_email'] = $shop_email;
						header('location:shopowner_profile.php');
					}
				}
				
				exit();
			}
			else if ($row['status'] != 0) {
				header("Location:index.php?error=User is Blocked");
			}
			
		}
		
		else {
			
			header("Location: index.php?error=Incorect User name or password");
			
			exit();
		}
	}
} else {
	
	echo mysqli_error($conn);
	exit();
}
