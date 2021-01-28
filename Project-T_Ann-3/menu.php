<?php
session_start();
include("./connectDatabase.php");
?>
<!DOCTYPE html>
<html>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="http://www.w3schools.com/w3css/4/w3.css" />
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<body>

  <?php
  //เรียกใช้ค่าจาก user_status
  if($_SESSION['st_id'] == 1){
   ?>
   <!--Sidebar -->
   <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
     <h3 class="w3-bar-item w3-center">เมนูหลัก</h3>
     <a href="./show_form_user.php" class="w3-bar-item w3-button">จัดการข้อมูลสมาชิก</a>
     <a href="./show_form_type.php" class="w3-bar-item w3-button">จัดการข้อมูลประเภทภาพยนตร์</a>
     <a href="./show_form_name.php" class="w3-bar-item w3-button">จัดการข้อมูลภาพยนตร์</a>
     <a href="./show_form_theater.php" class="w3-bar-item w3-button">จัดการข้อมูลโรงฉายภาพยนตร์</a>
     <a href="./show_form_time.php" class="w3-bar-item w3-button">จัดการข้อมูลรอบฉายภาพยนตร์</a>
     <a href="./show_form_code.php" class="w3-bar-item w3-button">จัดการข้อมูลโค๊ดส่วนลด</a>
     <a href="./show_form_detail.php" class="w3-bar-item w3-button">ดูข้อมูลการจองตั๋วภาพยนตร์</a>
     <center><p><?php echo $_SESSION['u_username'];?> | แอดมิน</p></center>
     <center><a href="./login.php">ออกจากระบบ</a></center>
   </div>
   <?php
 }else if($_SESSION['st_id'] == 2){
    ?>
    <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
      <h3 class="w3-bar-item w3-center">เมนูหลัก</h3>
      <a href="#" class="w3-bar-item w3-button">แก้ไข้ข้อมูลส่วนตัว</a>
      <a href="#" class="w3-bar-item w3-button">จองตั๋วภาพยนตร์</a>
      <a href="#" class="w3-bar-item w3-button">พิมพ์ตั๋วภาพยนตร</a>
      <center><p><?php echo $_SESSION['u_username'];?> | ตำแหน่งผู้ใช้งาน</p></center>
      <center><a href="./login.php">ออกจากระบบ</a></center>
    </div>


   <?php
} else {
  ?>
  <!--Sidebar -->
  <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%"><!--ส่วนของแถบเมนู-->
    <h3 class="w3-bar-item w3-center">เมนู</h3>
    <a href="./login.php" class="w3-bar-item w3-button">เข้าสู่ระบบ</a>
    <a href="./register.php" class="w3-bar-item w3-button">สมัครสมาชิก</a>
  </div>
  <?php
}
    ?>
    <script>
    function myFunction() {
    var x = document.getElementById("demo");
    if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
    } else {
      x.className = x.className.replace(" w3-show", "");
    }
    }
    </script>
