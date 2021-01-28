<?php
session_start();
include("./connectDatabase.php");
include("./menu.php");
include("./head.php");
$name_id=$_GET['name_id'];
$type_id=$_GET['type_id'];
$sql_name="select * from moviename where name_id='$name_id'";
$sql_type="select * from movietype where type_id='$type_id'";
$result_name = $mysqli->query($sql_name) or die ($mysqli->error._LINE_);
while ($row = mysqli_fetch_array($result_name)) {
  $name_id = $row["name_id"];
  $name_th = $row["name_th"];
  $name_en = $row["name_en"];
  $name_time = $row["name_time"];
  $name_timem = $row["name_timem"];
  $name_details = $row["name_details"];
  $u_type_id = $row["type_id"];

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
        <form action="./update_name.php" method="post" name="frm"><!--ส่งข้อมูลที่แก้ไขไปหน้า update_tyequipment-->
          <input type = "hidden" name="name_id" value="<?php echo $name_id;?>">
          <table style="width: 400px">
            <tbody>
              <tr>
                <td>
                  ชื่อภาพยนตร์ภาษาไทย :
                </td>
                <td>
                  <span class="error">*</span>
                </td>
                <td>
                  <input type="text" name="name_th" placeholder="ชื่อภาพยนตร์..." oninvalid="InvalidMsg(this);" required value="<?php echo $name_th;?>" />
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
                  <input type="text" name="name_en" placeholder="ชื่อภาพยนตร์..." oninvalid="InvalidMsg(this);" required value="<?php echo $name_en;?>" />
                </td>
              </tr>
              <tr height="50">
                <td>
                  ความยาวของภาพยนตร์/นาที :
                </td>
                <td>
                  <span class="error">*</span>
                </td>
                <td>
                  <input type="number" name="name_time"  oninvalid="InvalidMsg(this);" style="width: 3em" max="24" min="0" required value="<?php echo $name_time;?>"/> ชั่วโมง
                  <input type="number" name="name_timem"  oninvalid="InvalidMsg(this);" style="width: 3em" max="60" min="0" required value="<?php echo $name_timem;?>"/> นาที
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
                      $str_type="";
                      if ($u_type_id==$type_id)
                       {
                        $str_type="selected";
                      }

                      ?>
                      <option <?php echo $str_type;?> value="<?php echo $type_id;?>"><?php echo $type_en;?></option><!--เพื่อให้แสดงข้อเดิมก่อนแก้ไข-->
                      <?php
                      }
                      ?>
                  </select>
                </td>
              </tr>
              <tr height="50">
                <td valign="top">รายละเอียดภาพยนตร์ :</td>
                <td>&nbsp;</td>
                <td>
                  <textarea  id="name_details" name="name_details" placeholder="รายละเอียดภาพยนตร์..." oninvalid="InvalidMsg(this);" required ="" cols="30" rows="4" ><?php echo $name_details; ?></textarea>
                  <span class="error" style="color:red" >*</span>
                 </td>
              </tr>
            </tbody>
          </table><br />
          <input type="submit" class="w3-button w3-section w3-green w3-ripple" value="บันทึกข้อมูล" /> <input type="button" class="w3-button w3-section w3-red w3-ripple" value="ยกเลิก" onclick="window.location.href='show_form_name.php'" />
      </form>
      </div>
   </div>
