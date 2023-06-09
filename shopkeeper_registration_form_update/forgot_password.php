<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Recover Password</title>
    <link rel="stylesheet" type="text/css" href="style-forget.css">
</head>

<body>
    <h2>Recover Password</h2>
    <form action="recover_password.php" method="post">
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
        <label>Email</label>
        <?php if (isset($_GET['email'])) { ?>
            <input type="email" name="email" placeholder="Email" value="<?php echo $_GET['email']; ?>"><br>
        <?php } else { ?>
            <input type="email" name="email" placeholder="Email"><br>
        <?php } ?>

        <button type="submit" name="submit">Send Mail</button>
        <button type="button"><a href="login.php" style="color:white;text-decoration:none;">Back</a> </button>




    </form>
</body>

</html>