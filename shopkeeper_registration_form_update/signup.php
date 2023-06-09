<?php
// session_start();
include "db_conn.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="style-forget.css">
</head>
<body>
     <form action="signup-check.php" method="post">
     	<h2>SIGN UP</h2>
          <?php if (isset($_SESSION['smsg'])) { ?>
            <p class="success">
                <?php
                echo $_SESSION['smsg'];
                unset($_SESSION['smsg']);
                header("refresh:2,URL=index.php");
                ?>

            </p>
        <?php } ?>
        <?php if (isset($_SESSION['umsg'])) { ?>
            <p class="danger">
                <?php
                echo $_SESSION['umsg'];
                unset($_SESSION['umsg']);
                ?>

            </p>
        <?php } ?>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Email</label>
          <?php if (isset($_GET['email'])) { ?>
               <input type="email" 
                      name="email" 
                      placeholder="Email"
                      value="<?php echo $_GET['email']; ?>"><br>
          <?php }else{ ?>
               <input type="email" 
                      name="email" 
                      placeholder="Email"><br>
          <?php }?>

          <label>User Name</label>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"
                      value="<?php echo $_GET['uname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"><br>
          <?php }?>


     	<label>Password</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Password"><br>

          <label>Confirm Password</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Confirm Password"><br>
          <select name="catagory_user" class="input form-control " id="catagory">
                    <option value="">--Catagory--</option>
                    <option value="user">User</option>
                    <option value="shopkeeper">Shopkeeper</option>
           </select>

          

     	<button type="submit">Sign Up</button>
          <a href="home.php" class="ca">Already have an account?</a>
     </form>
</body>
</html>