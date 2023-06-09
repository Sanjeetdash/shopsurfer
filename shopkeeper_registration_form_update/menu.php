        <?php
          include('connection.php');
          
          session_start();
if (isset($_SESSION['shop_email'])) {
    $shop_email = $_SESSION['shop_email'];
    
} else {
    echo "not found";

}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="menu.css">
  <title>shop_menu</title>
</head>


<body>
  <?php include('shopkeeper_navbar.php'); ?>
  
<form action="menu_insert.php" method='POST' enctype="multipart/form-data">
  <div>
  <input type="hidden" name="user_id" value="<?php echo $shop_id ?>">
  </div>
  <div>
    <input type="text" id="name" name="dish_name" placeholder="enter dish name" required>
  </div>

  <div>
    <textarea id="desc" name="dish_desc" rows="5" placeholder="enter dish desc" required></textarea>
  </div>

  <div>
    
    <input type="text" id="price" name="dish_price"  placeholder="enter dish price" required>
  </div>
  

  

  <div>
    
    <select id="dish_type" name="dish_type">
      <option value="">--choose an option--</option>
      <option value="veg">veg</option>
      <option value="nonveg">nonveg</option>
    </select>
  </div>

  <div>
  <label for="image">Select Image File to Upload:</label> 
  <input type="file" class="form-control mb-3" accept="image/*" name="image">
  </div>

  <div>
  <input type="submit" name="submit" value="submit" />

  </div>
</form>

<div class="display-box">
    <table class="table bg-light" style="border-radius:5px;" >

      <thead>
        <tr class="table-th">
          
          <th class="col mr-3">DISH NAME</th>
          <th class="col">DISH DESC</th>
          <th class="col">DISH PRICE</th>
          <th class="col">DISH TYPE</th>
          <th class="col">DISH IMAGE</th>
          <th class="col">Op</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $sql="select * from resturant_product where email='" . $shop_email . "'";
      $result=mysqli_query($con,$sql);
      
      if($result)
      {
        while($data=mysqli_fetch_assoc($result))
        {
          ?>
          <tr>
            
            <td><?php echo $data['dish_name'];?></td>
            <td><?php echo $data['dish_desc'];?></td>
            <td><?php echo $data['dish_price'];?></td>
            <td><?php echo $data['dish_type'];?></td>
           
            <td><img src="product_image/<?php echo $data['image'];?>" alt="" style="width:100px; height:100px border-radius: 50%;"></td>
            <td>
              <button class="btn "style="background-color:#2b6777;"><a href="delete.php?delid=<?php echo $data['id']?>" class="text-light line"><i class="fa-solid fa-trash"></i></a></button>
              <button class="btn "style="background-color:#2b6777;"><a href="update.php?updateid=<?php echo $data['id']?>" class="text-light line">  <i class="fa-solid fa-pen-to-square"></i></a></button>
        </td>
            

            
         </tr>
         <?php
        }
      }
         ?>
    </tbody>
  </table>
</body>
</html>
