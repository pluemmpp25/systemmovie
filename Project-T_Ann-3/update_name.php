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
//ตรวจสอบการซ้ำในตารางข้อมูล
$sqlcheck="select * from moviename where name_th = '$name_th' and name_id != '$name_id' or name_en = '$name_en' and name_id != '$name_id'";
$result = $mysqli->query($sqlcheck);
if($row = mysqli_fetch_array($result)>0){
  echo "<script>";
  echo "alert('มีข้อมูลนี้ในระบบแล้ว');";
  echo "window.location='edit_name.php?name_id=$name_id'";
  echo "</script>";
  echo exit();
}

//แก้ไขข้อมูลลงตาราง
$sql="UPDATE moviename
      SET
      name_th=ltrim('$name_th'),
      name_en=ltrim('$name_en'),
      name_time=ltrim('$name_time'),
      name_timem=ltrim('$name_timem'),
      name_details=ltrim('$name_details'),
      type_id='$type_id'
      WHERE name_id='$name_id'";
$mysqli->query($sql) or die ($mysqli->error._LINE_);
$mysqli->close();
 ?>
 <meta http-equiv="refresh" content="0; url=./show_form_name.php" />
