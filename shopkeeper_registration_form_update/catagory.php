<?php

include('connection.php');


if(isset($_POST['submit'])){
    $type = $_POST['type'];
    $qry = "INSERT INTO catagory VALUES(0, '$type')";

    if(mysqli_query($con, $qry)){
        echo "<h2>catagory record inserted</h2>";
    } else {
        echo "<p>Error: ".mysqli_error($con)."</p>";
    }
}

