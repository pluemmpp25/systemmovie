<?php
session_start();
include("./connectDatabase.php");
$time_id = $_POST["time_id"];
$time_playdate = $_POST["time_playdate"];
$time_playtime = $_POST["time_playtime"];
$time_price = $_POST["time_price"];
$time_pricen = $_POST["time_pricen"];
$t_id = $_POST["t_id"];
$name_id = $_POST["name_id"];
$check_ty = 0;

$sql_time="select * from movietime where time_playtime='$time_playtime'";
$result_time = $mysqli->query($sql_time) or die ($mysqli->error._LINE_);
while ($row = mysqli_fetch_array($result_time)) {
  $time_id = $row["time_id"];
  $time_playdate = $row["time_playdate"];
  $time_playtime = $row["time_playtime"];
  $time_price = $row["time_price"];
  $t_id = $row["t_id"];
  $name_id = $row["name_id"];

// วนหาชื่เลือกหมวดหมู่่ซ้ำกัน
if($time_playtime == $time_playtime){
  $check_ty= 1;
}
}
if ($check_ty == 1) {
  echo "<body onload=\"window.alert('ชื่อภาพยนตร์นี้มีอยู่ในระบบแล้วกรุณาตรวจสอบอีกครั้ง');return history.back();\">";
}
if ($check_ty == 0) {



$sql="insert into movietime values('',ltrim('$time_playdate'),ltrim('$time_playtime'),ltrim('$time_price'),ltrim('$time_pricen'),ltrim('$t_id'),ltrim('$name_id'))";
$mysqli->query($sql) or die ($mysqli->error._LINE_);
$mysqli->close();
 ?>
 <meta http-equiv="refresh" content="0; url=./show_form_time.php" />
 <?php
}
  ?>
