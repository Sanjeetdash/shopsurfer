<?php
include('connection.php');

session_start();
if (isset($_SESSION['shop_email'])) {
    $shop_email = $_SESSION['shop_email'];
} else {
    echo "shop email not found";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link rel="stylesheet" href="shopowner_profile.css">
</head>
<body>

  <?php include('shopkeeper_navbar.php'); ?>

        <div class="sub-one">
            <?php 
              $qry = "select * from shop_owner where email='" . $shop_email . "'";
              $res=mysqli_query($con,$qry);
              while($data = mysqli_fetch_assoc($res))
              {
                $name = $data['name'];
              }
            ?>
            <h1 id="name-head">welcome!! <?php echo "$name" ?></h1>
            

            <div class="cards">
            <div class="card-one">
                    <div class="product-count">
                        <?php
                        $qry1 = "select COUNT(*) as count from resturant_product where email='" . $shop_email . "'";
                        $res1=mysqli_query($con,$qry1);
                        while($data1 = mysqli_fetch_assoc($res1))
                        {
                            $row_count = $data1['count'];
                           // echo "$row_count";
                        }
                        ?>
                        <h2 id="product-head">Products</h2>
                        <p id="number-p"> <span id="number-s"> number of products  </span> <?php echo " $row_count" ?></p>
                        <button id="btn"><a href="menu.php">Add more products</a></button>
                    </div>
                </div>

                <div class="card-one">
                    <div class="product-count">
                        <h2 id="product-head">Profile</h2>
                       <div class="card-buttons">
                        <button class="delete-button"><a href="delete_shopowner.php">Delete profile</a></button>
                        <button class="update-button"><a href="shopkeeper_update.php">Update profile</a></button>
                    </div>
                    </div>
                </div>
                <div class="card-one">
                    <div class="product-count">
                        <h2 id="product-head">Users</h2>
                        <?php
                        $qry2="select COUNT(user_review) as review_number from review_table where shop_email='" . $shop_email . "'";
                        $res2=mysqli_query($con,$qry2);
                        while($data2 = mysqli_fetch_assoc($res2))
                        {
                            $user_review = $data2['review_number'];
                           // echo "$row_count";
                        }
                        ?>
                        <p id="number-p"> <span id="number-s"> number of comments  </span> <?php echo " $user_review" ?></p>
                        <button id="btn"><a href="users.php">see user information</a></button>
                    </div>
                </div>
                

                <div class="card-one">
                    <div class="product-count">
                        <h2 id="product-head">Want to get featured?</h2>
                        <button id="btn"><a href="featured_resturant.php">click here</a></button>
                    </div>
                </div>

            </div>
        </div>
</body>
</html>
