<?php
include("./connectDatabase.php");
$time_id = $_GET['time_id'];

//เลือกตารางที่จะทำการลบข้อมูลออกจากตารางนั้น

///$show = "select * from equipment  where e_id='$e_id'";
///$result = $mysqli->query($show);
///if($row = mysqli_fetch_array($result)>0){
  //echo "<script>";
  ///echo "alert('คุณต้องการลบข้อมูลใช่หรือไม่');";
  ///echo "window.location='show_equipment.php';";
  //echo "</script>";
  ///echo exit();

//ทำการลบข้อมูลออกจากตารางนั้น
$sql_delete = "delete from movietime where time_id = '$time_id'";
$mysqli->query($sql_delete);



 ?>
  <meta http-equiv="refresh" content="0; url=./show_form_time.php" />
