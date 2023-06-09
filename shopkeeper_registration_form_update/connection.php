<?php

$con = mysqli_connect("localhost", "root", "","shopsurfer_up");

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
?>