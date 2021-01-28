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
//ตรวจสอบการซ้ำในตารางข้อมูล
$sqlcheck="select * from movietime where time_playtime = '$time_playtime' and time_id != '$time_id'";
$result = $mysqli->query($sqlcheck);
if($row = mysqli_fetch_array($result)>0){
  echo "<script>";
  echo "alert('มีข้อมูลนี้ในระบบแล้ว');";
  echo "window.location='edit_time.php?time_id=$time_id'";
  echo "</script>";
  echo exit();
}

//แก้ไขข้อมูลลงตาราง
$sql="UPDATE movietime
      SET
      time_playdate=ltrim('$time_playdate'),
      time_playtime=ltrim('$time_playtime'),
      time_price=ltrim('$time_price'),
      time_pricen=ltrim('$time_pricen'),
      t_id='$t_id',
      name_id='$name_id'
      WHERE time_id='$time_id'";
$mysqli->query($sql) or die ($mysqli->error._LINE_);
$mysqli->close();
 ?>
 <meta http-equiv="refresh" content="0; url=./show_form_time.php" />
