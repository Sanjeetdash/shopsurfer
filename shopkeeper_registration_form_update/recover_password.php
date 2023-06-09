<?php

include "db_conn.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




function sendMail($email, $token)
{
    require('PHPMailer/PHPMailer.php');
    require('PHPMailer/SMTP.php');
    require('PHPMailer/Exception.php');

    $mail = new PHPMailer(true);
    $mail->isSMTP();

    try {
        //Server settings
                                                         
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                  
        $mail->Username   = 'sanjeetdash10@gmail.com';                     
        $mail->Password   = 'rcehgtonedfqvivy';              
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 465;                           

        //Recipients
        $mail->setFrom('sanjeetdash10@gmail.com', 'Reset Password');
        $mail->addAddress($email);     
         
        //Content
        $mail->isHTML(true);                                 
        $mail->Subject = 'Reset Password Link';
        $mail->Body    = "Click on the link to reset password <br>
        <a href='http://localhost/new_project/shopkeeper_registration_form_update/updatepassword.php?email=$email&token=$token'>Reset Password</a>";
       
        
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

if (isset($_POST['submit'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    echo ($email);
    $token = bin2hex(random_bytes(15));



    if (empty($email)) {
        $_SESSION['umsg'] = "Email required";
        header("Location:forgot_password.php");
        exit();
    } else {


        $sql = "SELECT * FROM users WHERE email='$email' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $userData = mysqli_fetch_assoc($result);

            $userName = $userData['user_name'];
            $token = $userData['token'];



            if (sendMail($email, $token)) {
                $_SESSION['smsg'] = "Check your mail to reset account";
                header("Location:forgot_password.php");
            } else {
                $_SESSION['umsg'] = "Sending mail Failed. ";
                header("Location:forgot_password.php");
            }
        } else {
            $_SESSION['umsg'] = "Mail not found. ";
            header("Location:forgot_password.php");
        }
    }
} else {
    header("Location: login.php");
    exit();
}
