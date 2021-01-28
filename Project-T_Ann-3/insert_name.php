<?php
session_start();
include("./connectDatabase.php");
$name_id = $_POST["name_id"];
$name_th = $_POST["name_th"];
$name_en = $_POST["name_en"];
$name_time = $_POST["name_time"];
$name_timem = $_POST["name_timem"];
$name_details = $_POST["name_details"];
$type_id = $_POST["type_id"];
$check_ty = 0;

$sql_name="select * from moviename where name_th='$name_th' or name_en='$name_en' ";
$result_name = $mysqli->query($sql_name) or die ($mysqli->error._LINE_);
while ($row = mysqli_fetch_array($result_name)) {
  $name_id = $row["name_id"];
  $name_th = $row["name_th"];
  $name_en = $row["name_en"];
  $name_time = $row["name_time"];
  $name_details = $row["name_details"];
  $type_id = $row["type_id"];

// วนหาชื่เลือกหมวดหมู่่ซ้ำกัน
if($name_th == $name_th || $name_en == $name_en ){
  $check_ty= 1;
}
}
if ($check_ty == 1) {
  echo "<body onload=\"window.alert('ชื่อภาพยนตร์นี้มีอยู่ในระบบแล้วกรุณาตรวจสอบอีกครั้ง');return history.back();\">";
}
if ($check_ty == 0) {



$sql="insert into moviename values('',ltrim('$name_th'),ltrim('$name_en'),ltrim('$name_time'),ltrim('$name_timem'),ltrim('$name_details'),ltrim('$type_id'))";
$mysqli->query($sql) or die ($mysqli->error._LINE_);
$mysqli->close();
 ?>
 <meta http-equiv="refresh" content="0; url=./show_form_name.php" />
 <?php
}
  ?>
