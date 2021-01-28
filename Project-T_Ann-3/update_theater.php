<?php
session_start();
include("./connectDatabase.php");
$t_id = $_POST["t_id"];
$t_name = $_POST["t_name"];
$u_id = $_POST["u_id"];
$st_id = $_POST["st_id"];
$check_ty = 0;
//ตรวจสอบการซ้ำในตารางข้อมูล
$sqlcheck="select * from movietheater where t_name = '$t_name' and t_id != '$t_id'";
$result = $mysqli->query($sqlcheck);
if($row = mysqli_fetch_array($result)>0){
  echo "<script>";
  echo "alert('มีข้อมูลนี้ในระบบแล้ว');";
  echo "window.location='edit_theater.php?t_id=$t_id'";
  echo "</script>";
  echo exit();
}

//แก้ไขข้อมูลลงตาราง
$sql="UPDATE movietheater
      SET
      t_name=ltrim('$t_name'),
      u_id=ltrim('$u_id'),
      st_id=ltrim('$st_id')
      WHERE t_id='$t_id'";
$mysqli->query($sql) or die ($mysqli->error._LINE_);
$mysqli->close();
 ?>
 <meta http-equiv="refresh" content="0; url=./show_form_theater.php" />
