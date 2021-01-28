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
   <h2>จัดการข้อมูลโรงฉายภาพยนตร์>>เพิ่มข้อมูลโรงฉายภาพยนตร์</h2>
   <br>
   <form action="./insert_theater.php" method="post" name="frm"><!--ส่งข้อมูลที่ทำการเพิ่มไปหน้า insert_register-->
     <table width="50%" >
       <tbody>
         <tr>
           <td>
             ชื่อโรงฉายภาพยนตร์ :
           </td>
           <td>
             <span class="error">*</span>
           </td>
           <td>
             <input type="text" name="t_name" placeholder="ชื่อภาพยนตร์..." oninvalid="InvalidMsg(this);" required />
           </td>
         </tr>

         <tr height="50">
           <div id="st_id" style="display: none">
           <td>สถานะของโรงฉายภาพยนตร์ :</td>
           <td>&nbsp;</td>
           <td>
             <select id="st_id" name="st_id" onchange = "ShowHideDiv()"><!--สร้าง dropdown เพื่อเลือกคณะ-->
               <?php
               $sql2 = "select * from  theater_status ";//เลือกตารางที่จะโชว์ข้อมูล
               $result2 = $mysqli->query($sql2) or die ($mysqli->error._LINE_);
               while ($row2 = mysqli_fetch_array($result2)) {
                 $st_id = $row2["st_id"];
                 $st_name = $row2["st_name"];


                 echo "<option value=\"$st_id\">$st_name</option>";
               }
               ?>
             </select>
           </td>
         </tr>
       </tbody>
     </table><br />
     <input type="submit" class="w3-button w3-section w3-green w3-ripple" value="บันทึกข้อมูล" /> <input type="button" class="w3-button w3-section w3-red w3-ripple" value="ยกเลิก" onclick="window.location.href='show_form_theater.php'" />
 </form>
 </div>
</div>
