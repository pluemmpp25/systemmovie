<?php
session_start();
include("./connectDatabase.php");
include("./menu.php");
include("./head.php");
 ?>
<style media="screen">
.bg-custome {
  background-color: #28a745;
}
</style>
 <!--content-->
 <div style="margin-left:25%"><!--ขนาดของหัวข้อ-->
   <div class="w3-container w3-purple w3-center" style="padding: 2em 16px;"> <!--สีของหัวข้อ-->
     <h1>ระบบจองตั๋วภาพยนต์ออนไลน์</h1>
   </div>

   <div class="w3-container">
     <div class="w3-container" style="padding: 32px">
       <div class="row justify-content-center"><!--จัดตำแหน่งของตาราง-->
         <div class="col-lg-12 bg-light rounded my-2 py-2"> <!--พื้นหลังของตาราง-->
           <h4 class="text-left text pt-2">จัดการข้อมูลผู้ใช้งาน</h4>
           <hr /> <!--เส้นขึ้นระหว่างข้อความ-->

           <a href="./add_user.php">
             <button class="w3-button w3-section w3-blue w3-ripple" input type="submit">เพิ่มข้อมูลผู้ใช้งาน +</button>
           </a>
           <br><br>
            <table class="table table-bordered table-striped table-hover"><!--เริ่ม-->
              <thead>
                <tr><!--หัวข้อตาราง-->
                  <th class="bg-custome text-center">ลำดับ</th>
                  <th class="bg-custome text-center">ชื่อผู้ใช้งาน</th>
                  <th class="bg-custome text-center">อีเมล</th>
                  <th class="bg-custome text-center">สถานะผู้ใช้</th>
                  <th class="bg-custome text-center">การจัดการ</th>
                </tr>
              </thead>
                 <tbody>
              <?php
                $sql = "select * from  user";//เลือกตารางที่จะโชว์ข้อมูล
                $result = $mysqli->query($sql) or die ($mysqli->error._LINE_);
                $i=0;
                while ($row = mysqli_fetch_array($result)) {
                  $u_id = $row["u_id"];
                  $u_username = $row["u_username"];
                  $u_email = $row["u_email"];
                  $st_id = $row["st_id"];
                  $i=$i+1;

                  $sql2 = "select * from user_status where st_id = '$st_id'";//เลือกตารางโดยกำหนดโชวเฉพาะ์ข้อมูลที่ต้องการ
                  $result2 = $mysqli->query($sql2) or die ($mysqli->error._LINE_);
                  while ($row2 = mysqli_fetch_array($result2)) {
                    $st_id = $row2["st_id"];
                    $st_name = $row2["st_name"];
                    }

               ?>
               <tr>
                 <td><center><?php echo $i;?></center></td>
                 <td><center><?php echo $u_username;?></center></td>
                 <td><center><?php echo $u_email;?></center></td>
                 <td><center><?php echo $st_name;?></center></td>
                 <td><center><a href="./edit_user.php?u_id=<?php echo $u_id;?>">แก้ไข</a>
                  | <a href="./delete_user.php?u_id=<?php echo $u_id;?>"onclick="return confirm('ยืนยันการลบข้อมูล')">ลบ</a></center></td>
               </tr>
               <?php
              }
                ?>
                 </tbody>
            </table>

         </div>
       </div>
     </div>
   </div>
 </div>
 <?php
include("./footer.php");
  ?>
