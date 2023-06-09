<?php

include "db_conn.php";


if (isset($_POST['submit'])) {

    if (isset($_POST['token'])) {
        $token = $_POST['token'];


        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $pass = validate($_POST['password']);
        $cpass = validate($_POST['cpassword']);
        $hash_pass = md5($pass);


        if (empty($pass)) {
            $_SESSION['umsg'] = "Password required";
            header("Location:updatepassword.php");
            exit();
        } else {

            if ($pass === $cpass) {
                $updatequery = "update users set password='$hash_pass' where token = '$token'";
                $res = mysqli_query($conn, $updatequery);

                if ($res) {
                    $_SESSION['smsg'] = "Password Updated Successfully";
                    header("Location:login.php");
                }
            } else {
                $_SESSION['umsg'] = "Password doesnot match. ";
                header("Location:updatepassword.php");
            }
        }
    }
    else{
        $_SESSION['umsg'] = "Invalid Token. ";
        header("Location:updatepassword.php");
    }
} else {
    header("Location:updatepassword.php");
    exit();
}
