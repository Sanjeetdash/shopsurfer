<?php
include('connection.php');
session_start();
if (isset($_SESSION['shop_id'])) {
    $shop_id = $_SESSION['shop_id'];
} else {
    // handle case where primary key value is not set in session
}
if(isset($_POST['upload'])){
    $file = $_FILES['file'];
 //    var_dump($file);
    $name = $file['name'];
    $path = "image/".$name;
    if(move_uploaded_file($file['tmp_name'], $path)){
     $qry = "INSERT INTO image_shop VALUES(0,'$shop_id','$name')";
     if(mysqli_query($con, $qry)){
         header("Location: display.php?shop_id=$shop_id");
     } else {
         echo mysqli_errno($con);
     }
    } else {
     echo "image error";
    }
 }
?>
