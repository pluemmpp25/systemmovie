<?php
$mysqli = mysqli_connect("localhost","root","12345678","systemmovie");

if(mysqli_connect_errno($mysqli)){
  echo "Failed to connect to MySQL:". mysqli_connect_error();

}
$mysqli->query("SET NAMES utf8"); //set Language
 ?>
