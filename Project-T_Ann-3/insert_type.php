<?php
session_start();
include("./connectDatabase.php");
$type_id = $_POST['type_id'];
$type_th = $_POST['type_th'];
$type_en = $_POST['type_en'];
$u_id = $_SESSION["u_id"];
$check_ty = 0;

$sql_type="select * from movietype where type_th='$type_th' or type_en='$type_en'";
$result_type = $mysqli->query($sql_type) or die ($mysqli->error._LINE_);
while ($row = mysqli_fetch_array($result_type)) {
  $type_id = $row["type_id"];
  $type_th = $row["type_th"];
  $type_en = $row["type_en"];
  $u_id = $row['u_id'];

// วนหาชื่เลือกหมวดหมู่่ซ้ำกัน
if($type_th == $type_th || $type_en == $type_en){
  $check_ty= 1;
}
}
if ($check_ty == 1) {
  echo "<body onload=\"window.alert('ชื่อหมวดหมู่นี้มีอยู่ในระบบแล้วกรุณาตรวจสอบอีกครั้ง');return history.back();\">";
}
if ($check_ty == 0) {



$sql="insert into movietype values('',ltrim('$type_th'),ltrim('$type_en'),ltrim('$u_id'))";
$mysqli->query($sql) or die ($mysqli->error._LINE_);
$mysqli->close();
 ?>
 <meta http-equiv="refresh" content="0; url=./show_form_type.php" />
 <?php
}
  ?>
