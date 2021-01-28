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
   <h2>จัดการข้อมูลภาพยนตร์>>เพิ่มข้อมูลภาพยนตร์</h2>
   <br>
   <form action="./insert_name.php" method="post" name="frm"><!--ส่งข้อมูลที่ทำการเพิ่มไปหน้า insert_register-->
     <table width="50%" >
       <tbody>
         <tr>
           <td>
             ชื่อภาพยนตร์ภาษาไทย :
           </td>
           <td>
             <span class="error">*</span>
           </td>
           <td>
             <input type="text" name="name_th" placeholder="ชื่อภาพยนตร์..." oninvalid="InvalidMsg(this);" required />
           </td>
         </tr>
         <tr height="50">
           <td>
             ชื่อภาพยนตร์ภาษาอังกฤษ :
           </td>
           <td>
             <span class="error">*</span>
           </td>
           <td>
             <input type="text" name="name_en" placeholder="ชื่อภาพยนตร์..." oninvalid="InvalidMsg(this);" required />
           </td>
         </tr>
         <tr height="50">
           <td>
             ความยาวของภาพยนตร์ :
           </td>
           <td>
             <span class="error">*</span>
           </td>
           <td>
             <input type="number" name="name_time"  oninvalid="InvalidMsg(this);" required style="width: 3em" max="24" min="0"/> ชั่วโมง
             <input type="number" name="name_timem"  oninvalid="InvalidMsg(this);" required style="width: 3em" max="60" min="0"/> นาที
           </td>
         </tr>
         <tr height="50">
           <div id="type_id" style="display: none">
           <td>ชื่อประเภทภาพยนตร์ :</td>
           <td>&nbsp;</td>
           <td>
             <select id="type_id" name="type_id" onchange = "ShowHideDiv()"><!--สร้าง dropdown เพื่อเลือกคณะ-->
               <?php
               $sql = "select * from  movietype";//เลือกตารางที่จะโชว์ข้อมูล
               $result = $mysqli->query($sql) or die ($mysqli->error._LINE_);

               while ($row = mysqli_fetch_array($result)) {
                 $type_id = $row["type_id"];
                 $type_th = $row["type_th"];
                 $type_en = $row["type_en"];

                 echo "<option value=\"$type_id\">$type_en</option>";
               }
               ?>
             </select>
           </td>
         </tr>
         <tr height="50">
           <td valign="top">รายละเอียดภาพยนตร์ :</td>
           <td>&nbsp;</td>
           <td>
             <textarea  id="name_details" name="name_details" placeholder="รายละเอียดภาพยนตร์..." oninvalid="InvalidMsg(this);" required ="" cols="30" rows="4"></textarea>
             <span class="error" style="color:red" >*</span>
            </td>
         </tr>
       </tbody>
     </table><br />
     <input type="submit" class="w3-button w3-section w3-green w3-ripple" value="บันทึกข้อมูล" /> <input type="button" class="w3-button w3-section w3-red w3-ripple" value="ยกเลิก" onclick="window.location.href='show_form_name.php'" />
 </form>
 </div>
</div>
