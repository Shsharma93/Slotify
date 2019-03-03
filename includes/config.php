<?php
  ob_start();
  session_start();



  $timezone = date_default_timezone_get("Australia/Brisbane");
  $con = mysqli_connect("localhost", "root", "", "Slotify");

  if (mysqli_connect_errno()) {
    echo "Failed to connect" . mysqli_connect_errno();
  } 

?>