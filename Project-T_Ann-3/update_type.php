<?php
session_start();
include("./connectDatabase.php");
$type_id = $_POST['type_id'];
$type_th = $_POST['type_th'];
$type_en = $_POST['type_en'];
$u_id = $_SESSION["u_id"];
//ตรวจสอบการซ้ำในตารางข้อมูล
$sqlcheck="select * from movietype where type_th = '$type_th' and type_id != '$type_id' or type_en = '$type_en' and type_id != '$type_id'";
$result = $mysqli->query($sqlcheck);
if($row = mysqli_fetch_array($result)>0){
  echo "<script>";
  echo "alert('มีข้อมูลนี้ในระบบแล้ว');";
  echo "window.location='edit_type.php?type_id=$type_id'";
  echo "</script>";
  echo exit();
}

//แก้ไขข้อมูลลงตาราง
$sql="UPDATE movietype
      SET
      type_th=ltrim('$type_th'),
      type_en=ltrim('$type_en'),
      u_id='$u_id'
      WHERE type_id='$type_id'";
$mysqli->query($sql) or die ($mysqli->error._LINE_);
$mysqli->close();
 ?>
 <meta http-equiv="refresh" content="0; url=./show_form_type.php" />
