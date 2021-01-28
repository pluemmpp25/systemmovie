<?php
session_start();
include("./connectDatabase.php");
include("./menu.php");
include("./head.php");
$type_id=$_GET['type_id'];
$sql_type="select * from movietype where type_id='$type_id'";
$result_type = $mysqli->query($sql_type) or die ($mysqli->error._LINE_);
while ($row = mysqli_fetch_array($result_type)) {
  $type_id = $row["type_id"];
  $type_th = $row["type_th"];
  $type_en = $row["type_en"];
  $u_id = $row['u_id'];
}
 ?>
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
 <!--content-->
 <div style="margin-left: 25%">
   <div class="w3-container w3-purple w3-center">
     <h1>ระบบจองตั๋วภาพยนต์ออนไลน</h1>
   </div>

    <div class="w3-container">
      <h2>จัดการข้อมูลประเภทภาพยนตร์>>แก้ไขข้อมูลประเภทภาพยนตร์</h2>
        <form action="./update_type.php" method="post" name="frm"><!--ส่งข้อมูลที่แก้ไขไปหน้า update_tyequipment-->
          <input type = "hidden" name="type_id" value="<?php echo $type_id;?>">
          <table style="width: 450px">
            <tbody>
              <tr>
                <td>
                  ชื่อประเภทภาพยนตร์ภาษาไทย :
                </td>
                <td>
                  <span class="error">*</span>
                </td>
                <td>
                  <input type="text" name="type_th" placeholder="ชื่อประเภท..." oninvalid="InvalidMsg(this);" required  value="<?php echo $type_th;?>" />
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
                  <input type="text" name="type_en" placeholder="ชื่อประเภท..." oninvalid="InvalidMsg(this);" required  value="<?php echo $type_en;?>" />
                </td>
              </tr>
            </tbody>
          </table><br />
          <input type="submit" class="w3-button w3-section w3-green w3-ripple" value="บันทึกข้อมูล" /> <input type="button" class="w3-button w3-section w3-red w3-ripple" value="ยกเลิก" onclick="window.location.href='show_form_type.php'" />
      </form>
      </div>
   </div>
