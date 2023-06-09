<?php
include('connection.php');
ob_start();
session_start();
$email=$_SESSION['email'];
$sql="select * from users where email ='$email'";
$req=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($req);
$pass=$data['password'];
$emailerror="";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="shopkeeper_registration.css?v=2">
    <title>shopkeeper_registation</title>
</head>

<body>
    <div class="main">
      <div class="inside_main">
        <form action='shopkeeper_registration.php' method='post'>

            <div class="form-group">
            <input type="hidden" name="id">
            </div>
                <div class="form-group">
                    <input type="text" class="form-control " id="exampleInputName1" name="name" placeholder="Name" value="<?php echo $data['user_name']?>" readonly>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control " id="exampleInputName1" name="shop_name" placeholder="shop Name">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control " id="exampleInputMobile1" name="mobile" placeholder="Mobile Number">
                </div>

                <div class="form-group">
                    <input type="email" class="form-control " id="exampleInputEmail1" name="email" placeholder="Enter email" value="<?php echo $data['email'] ?>" readonly>
                </div>

                <div class="form-group">
                    <textarea type="text" rows="3" class="form-control " name="Addressline1" placeholder="Addressline1"></textarea>
                </div>
                <div class="form-group">
                    <textarea type="text" rows="3" class="form-control " name="Addressline2" placeholder="Addressline2"></textarea>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control " name="area" placeholder="Area">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control " name="city" placeholder="City">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control " name="pincode" placeholder="Pincode">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control " name="location" placeholder="location details">
                </div>

                <div>
                    <select name="type" class="input form-control " id="catagory">
                        <option value="">--Catagory--</option>
                        <option value="restaurant">Restaurant</option>
                        <option value="bakery">Bakery</option>
                        <option value="bookstore">Bookstore</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control " name="password" placeholder="password" id="password" value="<?php echo $pass?>"readonly>
                </div>
                <div class="sub">
                    <div class="sub-btn"><button type="submit" class="btn btn-primary " name="shop-submit"
                        style="background-color: #2b6777; border-color: #2b6777;">submit</button></div>
                    <div class="sign">
                        <label for="login">Already have a account?</label>
                        <a href="login.php">login</a>
                    </div>  
                </div>
            </div>
        </form>
    </div>
    </body>
        </html>
<?php
    if (isset($_POST['shop-submit'])) {
    $name = $_POST['name'];
    $shopname = $_POST['shop_name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address1 = $_POST['Addressline1'];
    $address2 = $_POST['Addressline2'];
    $area = $_POST['area'];
    $city =  $_POST['city'];
    $pin =  $_POST['pincode'];
    $location = $_POST['location'];
    $type = $_POST['type'];
    $password = $_POST['password'];
$sql = "SELECT * FROM shop_owner WHERE email='$email'";
$result = $con->query($sql);
if ($result->num_rows > 0) 
{
$emailerror = '<span style="color:rgb(255,0,0)">Email already taken</span>';
}
else
{
mysqli_query($con, "INSERT INTO catagory VALUES ('0', '$type')");
$type_id = mysqli_insert_id($con);
$qry = "INSERT INTO shop_owner values(0,'$name','$shopname','$mobile','$email','$address1','$address2','$area','$city','$pin','$location','$type_id','$password','shopkeeper')";
$qry2="insert into  login values(0,'$name','$email','$password','shopkeeper')";
$result = mysqli_query($con,$qry);
$result2 = mysqli_query($con,$qry2);
$shop_id = mysqli_insert_id($con);
$_SESSION['shop_email'] = $email;
header("Location:display.php");

}
    }


?>   
       