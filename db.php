<?php

$con = mysqli_connect('localhost','root','','circuitstock');

//$con = mysqli_connect('kyunahi.tk','u808433033_bleh','Its Cool!','u808433033_cs');

//$con = mysqli_connect('localhost','cstock_admin','12thp14aw0038','circuitstock');

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>