<?php
include("./connectDatabase.php");
$name_id = $_GET['name_id'];

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
$sql_delete = "delete from moviename where name_id = '$name_id'";
$mysqli->query($sql_delete);



 ?>
  <meta http-equiv="refresh" content="0; url=./show_form_name.php" />
