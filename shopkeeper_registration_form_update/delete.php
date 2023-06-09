<?php
include 'connection.php';
if(isset($_GET['delid']))
{
    $id=$_GET['delid'];
    $sql="delete from resturant_product where id=$id";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        header('location:menu.php');
    }
    else{
        die(mysqli_error($con));
}
}

?>