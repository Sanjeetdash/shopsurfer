<?php
include 'connection.php';

session_start();
if (isset($_SESSION['shop_email'])) {
    $shop_email= $_SESSION['shop_email'];
    
   
} else {
    echo "not found";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>
<?php  include('shopkeeper_navbar.php'); ?>
<div class="form-container">
    <h1>upload one shop photo</h1>
<input type="hidden" name="user_id" >
<form action="upload.php" method="post" enctype="multipart/form-data">
  <div class="main-container">
    <div class="img">
    <label for="image">Select Image File to Upload:</label> 
    <input type="file" name="file">
    </div>
    <div class="btn-1"><input type="submit" name="upload" value="Upload" class="upload-btn"></div>
    
    <div class="btn-two"><input type="submit" value="next"  class="next-btn" onclick="next()"/></div>
</div>
</form>
  </div>
    
</body>
</html>

<?php
// Include the database configuration file

// Get images from the database



$qry = $query = "SELECT * FROM image_shop WHERE email='" . $shop_email . "'";
 $res = mysqli_query($con, $qry);
 ?>
 <div class="container">
    <div class="row">
<?php
 while($data = mysqli_fetch_assoc($res)){

    $imageURL='image/'.$data['img_name'];
   
 ?>
    
    <div class="image"><img class="image-url" src="<?php echo $imageURL; ?>" alt="" height="300px" width="300px" /></div>
<?php
}
?>
</div>
</div>
 


<!-- JavaScript code to handle form submission and redirect -->
<script>
    function next() 
    {
        event.preventDefault(); // prevent the default form submission
        //console.log($imageURL);
      //  if ($imageURL === "") 
      //  {
          //  echo "please upload atleast one photo";
      //  } 
      //  else 
      //  {
            window.location.href = "menu.php"; // redirect to the next page
       // }
    }
</script>




