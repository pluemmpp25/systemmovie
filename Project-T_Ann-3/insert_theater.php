<?php
session_start();
include("./connectDatabase.php");
$t_id = $_POST["t_id"];
$t_name = $_POST["t_name"];
$u_id = $_POST["u_id"];
$st_id = $_POST["st_id"];
$check_ty = 0;

$sql_theater="select * from movietheater where t_name='$t_name'";
$result_theater = $mysqli->query($sql_theater) or die ($mysqli->error._LINE_);
while ($row = mysqli_fetch_array($result_theater)) {
    $t_id = $row["t_id"];
    $t_name = $row["t_name"];
    $u_id = $row["u_id"];
    $st_id = $row["st_id"];

// วนหาชื่เลือกหมวดหมู่่ซ้ำกัน
if($t_name == $t_name){
  $check_ty= 1;
}
}
if ($check_ty == 1) {
  echo "<body onload=\"window.alert('ชื่อโรงฉายภาพยนตร์นี้มีอยู่ในระบบแล้วกรุณาตรวจสอบอีกครั้ง');return history.back();\">";
}
if ($check_ty == 0) {



$sql="insert into movietheater values('',ltrim('$t_name'),'1001',ltrim('$st_id'))";
$mysqli->query($sql) or die ($mysqli->error._LINE_);
$mysqli->close();
 ?>
 <meta http-equiv="refresh" content="0; url=./show_form_theater.php" />
 <?php
}
  ?>
