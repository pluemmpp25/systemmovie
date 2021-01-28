<?php
  session_start();
  include ('./connectDatabase.php');

  $user=$_POST["username"];
  $password=$_POST["password"];

//เลือกตารางเพื่อวนดูข้อมูลของตารางนั้น
  $sql="SELECT * FROM user WHERE u_username='$user'";
    $result=$mysqli->query($sql) or die($mysqli->error.__LINE__);
    while ($row=mysqli_fetch_array($result)) {
      $u_id = $row["u_id"];
      $u_username = $row["u_username"];
      $u_email = $row["u_email"];
      $u_password = $row["u_password"];
      $st_id = $row["st_id"];
}
//ตรวจสอบความถูกต้องในการ login
if ($result->num_rows == 0)
{
  echo "<body onload=\"window.alert('ไม่มีผู้ใช้ในระบบ');return history.back();\">";
  exit();
}
else if ($password == $u_password)
{
  $_SESSION['u_id'] = $u_id;
  $_SESSION['u_username'] = $u_username;
  $_SESSION['st_id'] = $st_id;

  echo "<meta http-equiv=\"refresh\" content=\"0; url=./firstpage.php\">";
} else
{
  echo "<body onload=\"window.alert('รหัสผ่านไม่ถูกต้อง');return history.back();\">";
  exit();
}
?>
