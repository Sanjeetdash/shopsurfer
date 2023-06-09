<?php
include "home_navbar.html";
include "connection.php";

$qry = "SELECT * FROM featured_resturant AS fr INNER JOIN shop_owner AS r ON fr.email = r.email";



$res = mysqli_query($con,$qry);


$qry1 = "select * from shop_owner";

$res1 = mysqli_query($con,$qry1);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="/dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>TheLocalStore</title>
</head>

<body>
    <div class="main">

        <div class="search-bar">
            <form action="">
                <input type="search" class="search-bar-one" placeholder="search your fav local store...">
                <button class="search-btn">search</button>
            </form>
        </div>

        <div class="sub-one">
            <img src="img/poster.jpeg" alt="" class="image-main" id="image-main">
        </div>

        <div class="sub-two">
            <div class="heading">
                <h3>Order what makes you happy</h3>
            </div>
            <div class="images">
                <div class="image-one"><a href=""><img src="img/image-1.jpg" alt="" class="images-things">
                        <p class="title">Resturant</p>
                    </a></div>
                <div class="image-one"><a href=""><img src="img/image-2.jpg" alt="" class="images-things">
                        <p class="title">Bakery</p>
                    </a></div>
                <div class="image-one"><a href=""><img src="img/image-3.jpg" alt="" class="images-things">
                        <p class="title">BookStore</p>
                    </a></div>
                <div class="image-one"><a href=""><img src="img/image-4.jpg" alt="" class="images-things">
                        <p class="title">Salon</p>
                    </a></div>
            </div>
        </div>

        <div class="sub-three">
            <div class="heading" id="heading-one">
                <h3>Featured local shops</h3>
            </div>
            <div class="cards">
              <?php
              if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) 
                { 
                    $shop_email = $row['email'];
                    $url = "resturant_view.php?shop_email=" . $shop_email;
                    $qry2 = "select * from review_table where shop_email='" . $shop_email . "'";

                    $res2 = mysqli_query($con,$qry2);

                    $data = mysqli_fetch_assoc($res2);


              ?>
                <div class="card">
                    <div class="img-cls"><img src="img/image-11.jpg" alt="" class="card-img"></div>
                    <div class="heading-cls">
                        <div class="feature-heading">
                            <p class="shop-name"><?php echo "$row[shop_name]";?></p>
                            <span class="fa fa-star checked"></span>
                            <p class="star"><?php echo "$data[user_rating]";?></p>

                        </div>
                        <div class="feature-heading">
                            <p class="time"><?php echo "$row[area]";?></p>
                        </div>
                        <a href="<?php echo $url; ?>">View Details</a>
                    </div>
                </div>
                <?php
                }
            }
                ?>

        </div>
        <div class="sub-four">
            <div class="heading">
                <h3>Recommended shop near you</h3>
            </div>
            <div class="cards-one">
            <?php
            if ($res1->num_rows > 0) {
                while ($row1 = $res1->fetch_assoc()) 
                { 
                    $shop_email = $row1['email'];
                    $url = "resturant_view.php?shop_email=" . $shop_email;
                    
                    $qry4 = "select COUNT(*) as count from review_table where shop_email='" . $shop_email . "'";


                   
                    $res4 = mysqli_query($con,$qry4);


                    
                    $data2 = mysqli_fetch_assoc($res4);

                    $count = $data2['count'];

                    if($count==0)
                    {
                        $value=0;
                    }
                    else
                    {
                        $qry3 = "select * from review_table where shop_email='" . $shop_email . "'";
                        $res3 = mysqli_query($con,$qry3);
                        $data1 = mysqli_fetch_assoc($res3);
                        $value = $data1['user_rating'];
                    }
                    
              ?>
                <div class="card-one">
                    <div class="img-cls-one"><img src="img/image-14.jpg" alt="" class="card-img-one"></div>
                    <div class="heading-cls-one">
                        <div class="feature-heading">
                            <p class="shop-name"><?php echo "$row1[shop_name]";?></p>
                            <span class="fa fa-star checked checked-one"></span>
                            <p class="star"><?php echo "$value";?></p>
                        </div>
                        <div class="feature-heading"> <a href="<?php echo $url; ?>">view more</a></div>
                    </div>
                </div>

                <?php
                }}
                ?>

            <button class="show-more-btn">Show more</button>
            <footer>
                <div class="content">
                    <div class="left box">
                        <div class="upper">
                            <div class="topic">About us</div>
                            <p>TheLocalStore is a virtual store where you can access all the products want to buy and
                                can know the price without going to the store of your city.</p>
                        </div>
                        <div class="lower">
                            <div class="topic">Contact us</div>
                            <div class="phone">
                                <a href="#"><i class="fas fa-phone-volume"></i>+007 9089 6767</a>
                            </div>
                            <div class="email">
                                <a href="#"><i class="fas fa-envelope"></i>abc@gmail.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="middle box">
                        <div class="topic">Our Services</div>
                        <div><a href="#">Resturants</a></div>
                        <div><a href="#">Salons</a></div>
                        <div><a href="#">bakery</a></div>
                        <div><a href="#">bookstore</a></div>
                    </div>
                    <div class="right box">
                        <div class="topic">Subscribe us</div>
                        <form action="#">
                            <input type="text" placeholder="Enter email address">
                            <input type="submit" name="" value="Send">
                            <div class="media-icons">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="bottom">
                    <p>Copyright © 2023 <a href="#">TheLocalStore</a> All rights reserved</p>
                </div>
            </footer>


        </div>
        <script src="home.js"></script>
</body>

</html>