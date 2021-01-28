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
   <h2>จัดการข้อมูลรอบฉายภาพยนตร์>>เพิ่มข้อมูลรอบฉายภาพยนตร์</h2>
   <br>
   <form action="./insert_time.php" method="post" name="frm"><!--ส่งข้อมูลที่ทำการเพิ่มไปหน้า insert_register-->
     <table width="40%" >
       <tbody>
         <tr height="30">
           <div id="t_id" style="display: none">
           <td>โรงฉายภาพยนตร์ :</td>
           <td>&nbsp;</td>
           <td>
             <select id="t_id" name="t_id" onchange = "ShowHideDiv()"><!--สร้าง dropdown เพื่อเลือกคณะ-->
               <?php
               $sql2 = "select * from  movietheater where st_id != 2";//เลือกตารางที่จะโชว์ข้อมูล
               $result2 = $mysqli->query($sql2) or die ($mysqli->error._LINE_);
               while ($row2 = mysqli_fetch_array($result2)) {
                 $t_id = $row2["t_id"];
                 $t_name = $row2["t_name"];
                 $u_id = $row2["u_id"];
                 $st_id = $row2["st_id"];

                 echo "<option value=\"$t_id\">$t_name</option>";
               }
               ?>
             </select>
           </td>
         </tr>

         <tr height="30">
           <div id="name_id" style="display: none">
           <td>ชื่อภาพยนตร์ :</td>
           <td>&nbsp;</td>
           <td>
             <select id="name_id" name="name_id" onchange = "ShowHideDiv()"><!--สร้าง dropdown เพื่อเลือกคณะ-->
               <?php
               $sql4 = "select * from  moviename ";//เลือกตารางที่จะโชว์ข้อมูล
               $result4 = $mysqli->query($sql4) or die ($mysqli->error._LINE_);
               while ($row4 = mysqli_fetch_array($result4)) {
                 $name_id = $row4["name_id"];
                 $name_th = $row4["name_th"];
                 $name_en = $row4["name_en"];
                 $name_time = $row4["name_time"];
                 $name_details = $row4["name_details"];
                 $type_id = $row4["type_id"];

                 echo "<option value=\"$name_id\">$name_th</option>";
               }
               ?>
             </select>
           </td>
         </tr>

         <p><tr height="30">
           <td><label for="time_playdate">วันที่ฉาย :</label>
           <td>&nbsp;</td>
           <td><input type="date"  id="time_playdate" name="time_playdate" placeholder="วันทีจอง..." oninvalid="InvalidMsg(this);"
              required =""><span class="error" style="color:red" >*</span></td>
         </tr></p>

         <p><tr height="30">
           <td><label for="time_playtime">เวลาที่ฉาย :</label>
           <td>&nbsp;</td>
           <td><input type="time"  id="time_playtime" name="time_playtime" placeholder="เวลาจอง..." oninvalid="InvalidMsg(this);"
              required =""><span class="error" style="color:red" >*</span></td>
         </tr></p>

         <p><tr height="30">
           <td><label for="time_price">ราคาแถวหน้า :</label>
           <td>&nbsp;</td>
           <td><input type="text"  id="time_price" name="time_price" placeholder="ราคาแถวหน้า..." oninvalid="InvalidMsg(this);"
              required =""><span class="error" style="color:red" >*</span></td>
         </tr></p>

         <p><tr height="30">
           <td><label for="time_pricen">ราคาแถวหลัง :</label>
           <td>&nbsp;</td>
           <td><input type="text"  id="time_pricen" name="time_pricen" placeholder="ราคาแถวหลัง..." oninvalid="InvalidMsg(this);"
              required =""><span class="error" style="color:red" >*</span></td>
         </tr></p>
       </tbody>
     </table><br />
     <input type="submit" class="w3-button w3-section w3-green w3-ripple" value="บันทึกข้อมูล" /> <input type="button" class="w3-button w3-section w3-red w3-ripple" value="ยกเลิก" onclick="window.location.href='show_form_time.php'" />
 </form>
 </div>
</div>
