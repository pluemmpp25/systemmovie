<?php
  include("./head.php");
  include("./menu.php");
  include("./ConnectDatabase.php");
?>
<?php

$u_username=$_POST['u_username'];
$u_email=$_POST['u_email'];
$u_password=$_POST['u_password'];
$st_id=$_POST['st_id'];
$con_password =$_POST['con_password'];
$check_us = 0;
$check_em = 0;



$sql_user="select * from user where u_username='$u_username' or u_email='$u_email'";
$result_user = $mysqli->query($sql_user) or die ($mysqli->error._LINE_);
while ($row = mysqli_fetch_array($result_user)) {
  $u_id = $row["u_id"];
  $u_usernames = $row["u_username"];
  $u_emails = $row["u_email"];

if($u_usernames == $u_username){
$check_us = 1;
} elseif ($u_emails == $u_email) {
$check_em = 1;
}
}
if ($check_us == 1) {
  echo "<body onload=\"window.alert('มีชื่อผู้ใช้นี้ในระบบแล้ว');return history.back();\">";
}
else if ($check_em == 1) {
  echo "<body onload=\"window.alert('มีอีเมลนี้ในระบบแล้ว');return history.back();\">";
}
else if ($con_password != $u_password) {
  echo "<body onload=\"window.alert('รหัสผ่านต้องตรงกัน');return history.back();\">";
}
else {


$sql_insert ="INSERT INTO user VALUES('',ltrim('$u_username'),ltrim('$u_email'),ltrim('$u_password'),ltrim('$st_id'))";
$mysqli->query($sql_insert)or die($mysqli->error._LINE_);
$mysqli->close();
?>
<meta http-equiv="refresh" content="0; url=./show_form_user.php">
<?php
  }
?>
