<?php
session_start();
include("./connectDatabase.php");
include("./menu1.php");
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
   <h2>สมัครสมาชิก</h2>
   <br>
   <form action="./insert_register.php" method="post" name="frm"><!--ส่งข้อมูลที่ทำการเพิ่มไปหน้า insert_register-->
     <table width="30%" >
       <tr>
         <tr height="50">
           <td>ชื่อผู้ใช้งาน :</td>
           <td>&nbsp;</td>
           <td> <input type="text" id="user" name="u_username" placeholder="username..." oninvalid="InvalidMsg(this);" minlength="5"  title="ชื่อผู้ใช้งานต้องมี 5 ตัวขึ้นไป" minlength="5" required=" "><span class="error" style="color:red" >*</span></td>
         </tr>
         <tr height="50">
           <td>e-mail :</td>
           <td>&nbsp;</td>
           <td> <input type="email" id="email" name="u_email" placeholder="email..." oninvalid="InvalidMsg(this);" required=" "><span class="error" style="color:red" >*</span></td>
         </tr>
         <tr height="50">
           <td>รหัสผ่าน :</td>
           <td>&nbsp;</td>
           <td> <input type="password"  id="password" name="u_password" placeholder="password..." oninvalid="InvalidMsg(this);" minlength="8"
                title="ต้องมีความยาวย่างน้อย 8 ตัวอักษรขึ้นไป " required=" "
                value="<?php echo $user_password; ?>"> <span class="error" style="color:red" >*</span></td>
         </tr>
         <tr height="50">
           <td>ยืนยันรหัสผ่าน :</td>
           <td>&nbsp;</td>
           <td> <input type="password"  id="password" name="con_password" placeholder="password..." oninvalid="InvalidMsg(this);" minlength="8"
                title="ต้องมีความยาวย่างน้อย 8 ตัวอักษรขึ้นไป  " required=" "
                value="<?php echo $user_password; ?>"> <span class="error" style="color:red" >*</span> </td>

       </table>

<p><input type="submit" class="w3-button w3-section w3-green w3-ripple" value="บันทึกข้อมูล" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="button" value="ย้อนกลับ" class="w3-button w3-section w3-red w3-ripple" onclick="window.location.href='login.php'" /></p>
  <?php
    include("./footer.php");
  ?>
