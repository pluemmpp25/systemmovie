<?php
session_start();
include("./connectDatabase.php");
$code_id = $_POST["code_id"];
$code_name = $_POST["code_name"];
$code_discount = $_POST["code_discount"];
$code_exdate = $_POST["code_exdate"];
$code_extime = $_POST["code_extime"];
$u_id = $_POST["u_id"];
//ตรวจสอบการซ้ำในตารางข้อมูล
$sqlcheck="select * from discountcode where code_name = '$code_name' and code_id != '$code_id'";
$result = $mysqli->query($sqlcheck);
if($row = mysqli_fetch_array($result)>0){
  echo "<script>";
  echo "alert('มีข้อมูลนี้ในระบบแล้ว');";
  echo "window.location='edit_code.php?code_id=$code_id'";
  echo "</script>";
  echo exit();
}

//แก้ไขข้อมูลลงตาราง
$sql="UPDATE discountcode
      SET
      code_name=ltrim('$code_name'),
      code_discount=ltrim('$code_discount'),
      code_exdate=ltrim('$code_exdate'),
      code_extime=ltrim('$code_extime'),
      u_id='$u_id'
      WHERE code_id='$code_id'";
$mysqli->query($sql) or die ($mysqli->error._LINE_);
$mysqli->close();
 ?>
 <meta http-equiv="refresh" content="0; url=./show_form_code.php" />
