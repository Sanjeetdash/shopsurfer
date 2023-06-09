<?php
    include "db_conn.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Recover Password</title>
    <link rel="stylesheet" type="text/css" href="style-forget.css">
</head>

<body style = "background-color:#2b6777;">
    <h2>Reset Password</h2>
    <form action="reset_password.php" method="post">
        <?php if (isset($_SESSION['smsg'])) { ?>
            <p class="success">
                <?php
                echo $_SESSION['smsg'];
                unset($_SESSION['smsg']);
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
        <input type="hidden" value="<?php echo $_GET['token'] ?>" name="token">
        <label>New Password</label>
        <input type="password" name="password" placeholder="password"><br>
        <label>Confirm Password</label>
        <input type="password" name="cpassword" placeholder="Confirm password"><br>


        <button type="submit" name="submit">Reset Password</button>





    </form>
</body>

</html>