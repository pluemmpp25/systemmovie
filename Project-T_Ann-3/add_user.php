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
   <h2>จัดการข้อมูลผู้ใช้งาน>>เพิ่มข้อมูลผู้ใช้งาน</h2>
   <br>
   <form action="./insert_user.php" method="post" name="frm"><!--ส่งข้อมูลที่ทำการเพิ่มไปหน้า insert_register-->
     <table width="30%" >
       <tr>
         <tr height="50">
           <td>ชื่อผู้ใช้งาน :</td>
           <td>&nbsp;</td>
           <td> <input type="text" id="user" name="u_username" placeholder="username..." oninvalid="InvalidMsg(this);" minlength="5"  title="ชื่อผู้ใช้งานต้องมี 5 ตัวขึ้นไป"  required=" "><span class="error" style="color:red" >*</span></td>
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
                title="ต้องมีความยาวย่างน้อย 8 ตัวอักษรขึ้นไป " required=" "> <span class="error" style="color:red" >*</span></td>
         </tr>
         <tr height="50">
           <td>ยืนยันรหัสผ่าน :</td>
           <td>&nbsp;</td>
           <td> <input type="password"  id="password" name="con_password" placeholder="password..." oninvalid="InvalidMsg(this);" minlength="8"
                title="ต้องมีความยาวย่างน้อย 8 ตัวอักษรขึ้นไป  " required=" "> <span class="error" style="color:red" >*</span> </td>
         </tr>
         <tr height="50">
           <div id="st_id" style="display: none">
           <td>สถานะผู้ใช้ :</td>
           <td>&nbsp;</td>
           <td>
             <select id="st_id" name="st_id" onchange = "ShowHideDiv()"><!--สร้าง dropdown เพื่อเลือกคณะ-->
               <?php
                 $sql="SELECT *
                       FROM user_status";
                 $result=$mysqli->query($sql) or die($mysqli->error.__LINE__);
                 while($row=mysqli_fetch_array($result))
                 {
                   $st_id=$row["st_id"];
                   $st_name=$row["st_name"];

                 echo "<option value=\"$st_id\">$st_name</option>";
               }
               ?>
             </select>
           </td>
         </tr>
       </table>

<p><input type="submit" class="w3-button w3-section w3-green w3-ripple" value="บันทึกข้อมูล" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="button" class="w3-button w3-section w3-red w3-ripple" value="ย้อนกลับ" onclick="window.location.href='show_form_user.php'" /></p>
  <?php
    include("./footer.php");
  ?>
