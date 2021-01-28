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
   <h2>จัดการข้อมูลประเภทภาพยนตร์>>เพิ่มข้อมูลประเภทภาพยนตร์</h2>
   <br>
   <form action="./insert_type.php" method="post" name="frm"><!--ส่งข้อมูลที่ทำการเพิ่มไปหน้า insert_register-->
     <table width="40%" >
       <tbody>
         <tr>
           <td>
             ชื่อประเภทภาพยนตร์ภาษาไทย :
           </td>
           <td>
             <span class="error">*</span>
           </td>
           <td>
             <input type="text" name="type_th" placeholder="ชื่อประเภท..." oninvalid="InvalidMsg(this);" required />
           </td>
         </tr>
         <tr height="50">
           <td>
             ชื่อประเภทภาพยนตร์ภาษาอังกฤษ :
           </td>
           <td>
             <span class="error">*</span>
           </td>
           <td>
             <input type="text" name="type_en" placeholder="ชื่อประเภท..." oninvalid="InvalidMsg(this);" required />
           </td>
         </tr>
       </tbody>
     </table><br />
     <input type="submit" class="w3-button w3-section w3-green w3-ripple" value="บันทึกข้อมูล" /> <input type="button" class="w3-button w3-section w3-red w3-ripple" value="ยกเลิก" onclick="window.location.href='show_form_type.php'" />
 </form>
 </div>
</div>
