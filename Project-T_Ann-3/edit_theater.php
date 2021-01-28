<?php
session_start();
include("./connectDatabase.php");
include("./menu.php");
include("./head.php");
$t_id=$_GET['t_id'];
$st_id=$_GET['st_id'];
$sql_theater="select * from movietheater where t_id='$t_id'";
$sql_sttheater="select * from theater_status where st_id='$st_id'";
$result_theater = $mysqli->query($sql_theater) or die ($mysqli->error._LINE_);
while ($row = mysqli_fetch_array($result_theater)) {
  $t_id = $row["t_id"];
  $t_name = $row["t_name"];
  $u_id = $row["u_id"];
  $s_st_id = $row["st_id"];

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
      <h2>จัดการข้อมูลประเภทภาพยนตร์>>แก้ไขข้อมูลโรงฉายภาพยนตร์</h2>
        <form action="./update_theater.php" method="post" name="frm"><!--ส่งข้อมูลที่แก้ไขไปหน้า update_tyequipment-->
          <input type = "hidden" name="t_id" value="<?php echo $t_id;?>">
          <table style="width: 400px">
            <tbody>
              <tr>
                <td>
                  ชื่อโรงฉายภาพยนตร์ :
                </td>
                <td>
                  <span class="error">*</span>
                </td>
                <td>
                  <input type="text" name="t_name" placeholder="ชื่อภาพยนตร์..." oninvalid="InvalidMsg(this);" required value="<?php echo $t_name;?>" />
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
                      $str_theater="";
                      if ($s_st_id==$st_id)
                       {
                        $str_theater="selected";
                      }

                      ?>
                      <option <?php echo $str_theater;?> value="<?php echo $st_id;?>"><?php echo $st_name;?></option><!--เพื่อให้แสดงข้อเดิมก่อนแก้ไข-->
                      <?php
                      }
                      ?>
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
