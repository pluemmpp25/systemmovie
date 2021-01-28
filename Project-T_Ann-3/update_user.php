<?php
  include("./ConnectDatabase.php");
?>
<!--ดึงข้อมูลมาจากตาราง user-->
<?php
$u_id=$_POST['u_id'];
$u_username=$_POST['u_username'];
$u_email=$_POST['u_email'];
$u_password=$_POST['u_password'];
$con_password =$_POST['con_password'];
$st_id=$_POST['st_id'];

//ตรวจสอบการซ้ำในตารางข้อมูล
$sqlcheck="select * from user where u_username='$u_username' and u_id != '$u_id' or u_email='$u_email' and u_id != '$u_id'";
$result = $mysqli->query($sqlcheck);
if($row = mysqli_fetch_array($result)>0){
  echo "<body onload=\"window.alert('มีชื่อผู้ใช้หรืออีเมลนี้ในระบบแล้ว');return history.back();\">";
  echo exit();
}
if ($con_password != $u_password) {
 echo "<body onload=\"window.alert('รหัสผ่านต้องตรงกัน');return history.back();\">";
 echo exit();
}
//แก้ไขข้อมูลลงตาราง
$sql="UPDATE user
      SET
      u_username=ltrim('$u_username'),
      u_email=ltrim('$u_email'),
      u_password=ltrim('$u_password'),
      st_id='$st_id'
      WHERE u_id='$u_id'";
$mysqli->query($sql) or die ($mysqli->error._LINE_);
$mysqli->close();
?>
<meta http-equiv="refresh" content="0; url=./show_form_user.php">
