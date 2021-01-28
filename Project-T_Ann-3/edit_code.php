<?php
session_start();
include("./connectDatabase.php");
include("./menu.php");
include("./head.php");
 ?>

 <html>
 <title></title>
 <meta name="viewport" content="width=device-width, initial-scale=1" />
 <link rel="stylesheet" href="http://www.w3schools.com/w3css/4/w3.css" />
 <body>
   <style>
   .error{color: #FF0000;}
   </style>

   <script>//แจ้งเตือนให้กรอกข้อมูลโดยต้องเชื่อมกับ  oninvalid="InvalidMsg(this);"
   function InvalidMsg(textbox){
     if(textbox.value===''){
       textbox.setCustomValidity
       ('กรุณากรอกข้อมูลที่มีเครื่องหมาย * ให้ครบถ้วน');
     }else{
       textbox.setCustomValidity('');
     }
     return ture;
   }
   </script>
   <!--Sidebar -->
   <div style="margin-left:25%">
 <div class="w3-container w3-purple w3-center">
   <h1>ระบบจองตั๋วภาพยนต์ออนไลน์</h1>
 </div>
 <div class="w3-container">
   <h2>จัดการข้อมูลโค๊ดส่วนลด>>แก้ไขข้อมูลโค๊ดส่วนลด</h2>
   </div>
   <br>

   <?php
   $u_id = $_GET['u_id']; //รับข้อมูลมาจาก insert_register หรือ user_id
   $code_id = $_GET['code_id'];
   $sql = "SELECT * FROM discountcode where code_id ='$code_id' "; //;วนหาข้อมูลที่ต้องการแก้ไข
   $result = $mysqli->query($sql)or die($mysqli->error.__LINE__);
   $i=0;
   while($row=mysqli_fetch_array($result))
   {
     $code_id = $row["code_id"];
     $code_name = $row["code_name"];
     $code_discount = $row["code_discount"];
     $code_exdate = $row["code_exdate"];
     $code_extime = $row["code_extime"];
     $u_id  = $row["u_id "];
     $date =$code_exdate;
     $newdate= date("d-m-Y" , strtotime($date));
     $i=$i+1;
   }
   ?>
   <div class="container">
  <form action="./update_code.php" method="post" name="frm" id="myform"><!--ส่งข้อมูลที่แก้ไขไปหน้า update_profile-->
    <input type="hidden" name="code_id" value="<?php echo $code_id; ?>">
     <table width="40%" >
       <tr>
         <tr height="50">
           <td>ชื่อโค๊ต :</td>
           <td>&nbsp;</td>
           <td> <input type="text"  name="code_name" placeholder="ชื่อโค๊ต..." oninvalid="InvalidMsg(this);" required=" " value="<?php echo $code_name; ?>"><span class="error" style="color:red" >*</span></td>
         </tr>

         <tr height="50">
           <td>ราคาที่ลด :</td>
           <td>&nbsp;</td>
           <td> <input type="text"  name="code_discount" placeholder="ราคาที่ลด..." oninvalid="InvalidMsg(this);" required=" " value="<?php echo $code_discount; ?>"><span class="error" style="color:red" >*</span></td>
         </tr>

         <tr height="50">
           <td>วันที่หมดอายุ :</td>
           <td>&nbsp;</td>
           <td> <input type="date"  name="code_exdate"  oninvalid="InvalidMsg(this);" required=" " value="<?php echo $code_exdate; ?>"><span class="error" style="color:red" >*</span></td>
         </tr>

         <tr height="50">
           <td>เวลาที่หมดอายุ :</td>
           <td>&nbsp;</td>
           <td> <input type="time"  name="code_extime"  oninvalid="InvalidMsg(this);" required=" " value="<?php echo $code_extime; ?>"><span class="error" style="color:red" >*</span></td>
         </tr>
       </tr>
       </table>

<p><input type="submit" class="w3-button w3-section w3-green w3-ripple" value="บันทึกข้อมูล" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="button" class="w3-button w3-section w3-red w3-ripple" value="ย้อนกลับ" onclick="window.location.href='show_form_code.php'" /></p>
  <?php
    include("./footer.php");
  ?>
