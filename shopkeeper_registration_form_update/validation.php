<?php
include 'connection.php';
if(isset($_POST['log_submit']))
{
    $password=$_POST['password'];
    $email=$_POST['email'];
    $catagory_user=$_POST['catagory_user'];
    echo"$catagory_user";
    if($catagory_user=="admin")
    {
        $sql="select * from `admin` where email='$email' and password='$password'";
        $result=mysqli_query($con,$sql);
        $res=mysqli_fetch_assoc($result);
        $num=mysqli_num_rows($result);
        if($num==1){
            session_start();
            $email=$res['email'];
            $_session['email']=$email;
            header('location:admin.php');
        }
        else{
            header('location:login.html');
        }
        
    }
    else if($catagory_user=="user")
    {
        $sql="select * from `register` where email='$email' and Password='$password'";
        $result=mysqli_query($con,$sql);
        $res=mysqli_fetch_assoc($result);
        $num=mysqli_num_rows($result);
        if($num==1)
        {
            session_start();
            $email=$res['email'];
            $_session['email']=$email;
            header('location:home.php');
        }
        else{
            header('location:login.php');
        }

    }
    else if($catagory_user=="shopkeeper")
    {
        $sql="select * from `shop_owner` where email='$email' and Password='$password'";
        $result=mysqli_query($con,$sql);
        $res=mysqli_fetch_assoc($result);
        $num=mysqli_num_rows($result);
        if($num==1)
        {
            session_start();
            $shop_id = $res['id'];
            $_SESSION['shop_id'] = $shop_id;
            header('location:shopowner_profile.php');
        }
        else{
            header('location:login.html');
        }

        
    }
    
    else{
        echo"invalid";
    }

}

?>