<?php
include "connection.php";


$email = $_GET['email'];
$qry3 = "select * from shop_owner where email=$email";

$res = mysqli_query($con,$qry3);


session_start();

while($resdata = mysqli_fetch_assoc($res));
{
$_SESSION['shop_id'] = $resdata['id'];

header("Location: display.php");
}
?>