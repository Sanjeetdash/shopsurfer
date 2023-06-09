<?php
include "home_navbar.html";
include "connection.php";

if(isset($_GET['shop_email']))
{ 
  $shop_email=$_GET['shop_email'];
}
//if (isset($_GET['shop_id'])) {
   // $shop_id = $_GET['shop_id'];

   $sql1="select * from shop_owner where email='" . $shop_email . "'";
    $sql2="select * from resturant_product where email='" . $shop_email . "'";
    

    $result1=mysqli_query($con,$sql1);
    $result2=mysqli_query($con,$sql2);
    

    $res1 = mysqli_fetch_assoc($result1);
    $res2 = mysqli_fetch_assoc($result2);
    
   
session_start();
{
    $_SESSION['shop_email']=$shop_email;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charftyg53set="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="resturant_view.css?v=2">
  
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  
</head>

<style>
  .filters {
    margin-top:40px;
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
}

.filters label {
    margin-right: 10px;
}

.filters input[type="radio"] {
    display: none;
}

.filters label {
    padding: 10px 20px;
    border-radius: 20px;
    background-color: #f2f2f2;
    cursor: pointer;
    color:black;

}

.filters label:hover {
    background-color: #e6e6e6;
}

.filters input[type="radio"]:checked+label {
    background-color: #007bff;
    color: #fff;
}

  </style>
<body>
  <div class="main-1">
  <div class="heading-box">
    <div class="heading-1">
       <div class="name-1">
      <h1 class="res-name"> <?php echo "$res1[shop_name]";?></h1>
      <p class="type"><b>fast food,street food</b></p>
      <p class="address"><?php echo "$res1[area]";?></p>
     <span class="time"><i class="fa-solid fa-truck-fast"></i></span> <span class="dis"><b>3 km away</b></span>
      <div class="offers">
        <div class="one-offer">
        <span class="offer-text">50% OFF on order above 1000</span>
  <p class="coupon-code">Use Coupon Code: SAVE50</p>
        </div>
        <div class="one-offer">
        <p class="offer-text">10% OFF on order above 500</p>
  <p class="coupon-code">Use Coupon Code: SAVE10</p>
        </div>
      </div>
      
     </div>
     <div class="rating">
      <div class="rate">
      <span class="star-1"><i class="fa-solid fa-star"></i></span>
      <span class="star-1">4.5</span>
      </div>    
      <p class="number">200</p>
       <p class="review">rated</p>
     </div>
</div>
</div>
</div> 
<div class="filters">
<label>
        <input type="radio" name="filter" value="all" checked id="myCheckbox"> All
    </label>
    <label>
        <input type="radio" name="filter" value="veg" id="myCheckbox"> Vegetarian
    </label>
    <label>
        <input type="radio" name="filter" value="nonveg" id="myCheckbox"> Non-Vegetarian
    </label>
</div> 
   
    <div id="dishesList">
</div>

    <?php
    include "demo.php";
  ?>

<script>
        function fetchData(filter) {
            $.ajax({
                url: 'filter.php',
                data: { filter: filter },
                dataType: 'json',
                success: function(data) {
                    // Update the UI with the filtered data
                    $('#dishesList').empty();
                    data.forEach(function(dish) {
                        var dishHtml = '<div class="container-1">';
                        dishHtml +='<div class="sub-main-two">';
                        dishHtml +='<div class="dishes">';
                        dishHtml +='<div class="dish">';
                        dishHtml += '<h3 class="dish-name">' + dish.dish_name + '</h3>';
                        dishHtml += '<p class="dish-desc">' + dish.dish_desc + '</p>';
                        dishHtml += '<p class="dish-price">&#8377: ' + dish.dish_price + '</p>';
                        dishHtml += '</div>';
                        dishHtml += ' <div class="dish-image"> ';
                        dishHtml += '<img src="product_image/' + dish.image + '" alt="' + dish.dish_name + '" width="200">';
                        dishHtml += '</div>';
                        dishHtml += '</div>';
                        dishHtml += '</div>';
                        dishHtml += '</div>';
                        dishHtml += '</div>';

                        $('#dishesList').append(dishHtml);
                    });
                },
                error: function() {
                    console.log('Error occurred during AJAX request.');
                }
            });
        }

        $(document).ready(function() {
            $('input[type=radio][name=filter]').on('change', function() {
                var filterValue = $(this).val();
                fetchData(filterValue);
            });

            // Fetch all dishes initially
            fetchData('all');
        });
    </script>
<script>
document.getElementById("myCheckbox").addEventListener("change", function() {
  var label = this.nextElementSibling;
  label.classList.toggle("checked");
<script>
});
</body>
</html>