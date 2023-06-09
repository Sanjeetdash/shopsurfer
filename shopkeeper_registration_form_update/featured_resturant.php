
<?php
include "connection.php";
include "shopkeeper_navbar.php";

session_start();
if (isset($_SESSION['shop_id'])) {
    $shop_id = $_SESSION['shop_id'];
} else {
    echo "shop id not found";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Responsive Form</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .form-container {
            max-width: 400px;
            margin: 50px auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #2b6777;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        #submit a {
            color: #fff;
            text-decoration:none;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="featured_resturant.php" method="post">            <div class="form-group">
                <label for="name">ShopName:</label>
                <input type="text" id="name" placeholder="Enter your shop name" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" placeholder="Enter your email" name="email">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="submit" id="submit">
            </div>
        </form>
    </div>
</body>
</html>


<?php

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];

$qry = "insert into featured_resturant values(0,'$shop_id','$name','$email')";
$result = mysqli_query($con,$qry);

if($result)
{
    header("location:success.php");
}
else
{
    die(mysqli_error($con));
}


}

?>