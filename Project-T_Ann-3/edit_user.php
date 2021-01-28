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
   <h2>จัดการข้อมูลผู้ใช้งาน>>แก้ไขข้อมูลผู้ใช้งาน</h2>
   </div>
   <br>

   <?php
   $u_id = $_GET['u_id']; //รับข้อมูลมาจาก insert_register หรือ user_id
   $sql = "SELECT * FROM user where u_id ='$u_id' "; //;วนหาข้อมูลที่ต้องการแก้ไข
   $result = $mysqli->query($sql)or die($mysqli->error.__LINE__);
   $i=0;
   while($row=mysqli_fetch_array($result))
   {
   $i=$i+1;
   $u_id = $row["u_id"];
   $u_username = $row["u_username"];
   $u_password = $row["u_password"];
   $u_email = $row["u_email"];
   $u_st_id = $row["st_id"];
   }
   ?>
   <div class="container">
  <form action="./update_user.php" method="post" name="frm" id="myform"><!--ส่งข้อมูลที่แก้ไขไปหน้า update_profile-->
    <input type="hidden" name="u_id" value="<?php echo $u_id; ?>">
     <table width="40%" >
       <tr>
         <tr height="50">
           <td>ชื่อผู้ใช้งาน :</td>
           <td>&nbsp;</td>
           <td> <input type="text" id="user" name="u_username" placeholder="username..." oninvalid="InvalidMsg(this);" minlength="5"  title="ชื่อผู้ใช้งานต้องมี 5 ตัวขึ้นไป" minlength="5" required=" " value="<?php echo $u_username; ?>"><span class="error" style="color:red" >*</span></td>
         </tr>
         <tr height="50">
           <td>e-mail :</td>
           <td>&nbsp;</td>
           <td> <input type="email" id="email" name="u_email" placeholder="email..." oninvalid="InvalidMsg(this);" required=" " value="<?php echo $u_email; ?>"><span class="error" style="color:red" >*</span></td>
         </tr>
         <tr height="50">
           <td>รหัสผ่าน :</td>
           <td>&nbsp;</td>
           <td> <input type="password"  id="password" name="u_password" placeholder="password..." oninvalid="InvalidMsg(this);"
                required=" " value="<?php echo $u_password; ?>"> <span class="error" style="color:red" >*</span></td>
         </tr>
         <tr height="50">
           <td>ยืนยันรหัสผ่าน :</td>
           <td>&nbsp;</td>
           <td> <input type="password"  id="password" name="con_password" placeholder="password..." oninvalid="InvalidMsg(this);"
                 required=" " value="<?php echo $u_password; ?>"> <span class="error" style="color:red" >*</span> </td>
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
                   $u_st="";
                   if ($u_st_id==$st_id)
                    {
                     $u_st="selected";
                   }

                   ?>
                   <option <?php echo $u_st;?> value="<?php echo $st_id;?>"><?php echo $st_name;?></option><!--เพื่อให้แสดงข้อเดิมก่อนแก้ไข-->
                   <?php
                   }
                   ?>
             </select>
           </td>
         </tr>
        </tr>
       </table>

<p><input type="submit" class="w3-button w3-section w3-green w3-ripple" value="บันทึกข้อมูล" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="button" value="ย้อนกลับ" class="w3-button w3-section w3-red w3-ripple" onclick="window.location.href='show_form_user.php'" /></p>
  <?php
    include("./footer.php");
  ?>
