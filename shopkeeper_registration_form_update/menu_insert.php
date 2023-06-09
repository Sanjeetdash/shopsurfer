<?php

include('connection.php');

session_start();
if (isset($_SESSION['shop_email'])) {
    $shop_email = $_SESSION['shop_email'];
} else {
    // handle case where primary key value is not set in session
}
include 'connection.php';
if(isset($_POST['submit']))
          {
            $dish_name=$_POST['dish_name'];
            $dish_desc=$_POST['dish_desc'];
            $dish_price=$_POST['dish_price'];
            $dish_type=$_POST['dish_type'];
            $image=$_FILES['image'];

            $image_name=$image['name'];
            $path="product_image/".$image_name;
            if(move_uploaded_file($image['tmp_name'],$path))
            {
            
            
            $sql="insert into resturant_product values('0','$shop_id','$shop_email','$dish_name','$dish_desc','$dish_price','$dish_type','$image_name')";
            $result=mysqli_query($con,$sql);
            if($result)
            {
              
           header('location:menu.php');
            }
            else{
              die(mysqli_error($con));
        
            }
        
          }
        }

?>
