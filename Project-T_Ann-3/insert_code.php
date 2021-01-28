<?php
session_start();
include("./connectDatabase.php");
$code_id = $_POST["code_id"];
$code_name = $_POST["code_name"];
$code_discount = $_POST["code_discount"];
$code_exdate = $_POST["code_exdate"];
$code_extime = $_POST["code_extime"];
$u_id = $_POST["u_id"];
$check_ty = 0;

$sql_code="select * from discountcode where code_name='$code_name'";
$result_code = $mysqli->query($sql_code) or die ($mysqli->error._LINE_);
while ($row = mysqli_fetch_array($result_code)) {
  $code_id = $row["code_id"];
  $code_name = $row["code_name"];
  $code_discount = $row["code_discount"];
  $code_exdate = $row["code_exdate"];
  $code_extime = $row["code_extime"];
  $u_id  = $row["u_id "];

// วนหาชื่เลือกหมวดหมู่่ซ้ำกัน
if($code_name == $code_name){
  $check_ty= 1;
}
}
if ($check_ty == 1) {
  echo "<body onload=\"window.alert('โค๊ตภาพยนตร์นี้มีอยู่ในระบบแล้วกรุณาตรวจสอบอีกครั้ง');return history.back();\">";
}
if ($check_ty == 0) {



$sql="insert into discountcode values('',ltrim('$code_name'),ltrim('$code_discount'),ltrim('$code_exdate'),ltrim('$code_extime'),ltrim('$u_id'))";
$mysqli->query($sql) or die ($mysqli->error._LINE_);
$mysqli->close();
 ?>
 <meta http-equiv="refresh" content="0; url=./show_form_code.php" />
 <?php
}
  ?>
