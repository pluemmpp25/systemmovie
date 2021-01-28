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
           <h4 class="text-left text pt-2">จัดการข้อมูลประเภทภาพยนตร์</h4>
           <hr /> <!--เส้นขึ้นระหว่างข้อความ-->

           <a href="./add_type.php">
             <button class="w3-button w3-section w3-blue w3-ripple" input type="submit">เพิ่มข้อมูลประเภทภาพยนตร์ +</button>
           </a>
           <br>
            <table class="table table-bordered table-striped table-hover"><!--เริ่ม-->
              <thead>
                <tr><!--หัวข้อตาราง-->
                  <th class="bg-custome text-center">ลำดับ</th>
                  <th class="bg-custome text-center">ชื่อประเภทภาษาไทย</th>
                  <th class="bg-custome text-center">ชื่อประเภทภาษาอังกฤษ</th>
                  <th class="bg-custome text-center">การจัดการ</th>
                </tr>
              </thead>
                 <tbody>
              <?php
                $sql = "select * from  movietype";//เลือกตารางที่จะโชว์ข้อมูล
                $result = $mysqli->query($sql) or die ($mysqli->error._LINE_);
                $i=0;
                while ($row = mysqli_fetch_array($result)) {
                  $type_id = $row["type_id"];
                  $type_th = $row["type_th"];
                  $type_en = $row["type_en"];
                  $u_id = $row["u_id"];
                  $i=$i+1;

               ?>
               <tr>
                 <td><center><?php echo $i;?></center></td>
                 <td><center><?php echo $type_th;?></center></td>
                 <td><center><?php echo $type_en;?></center></td>
                 <td><center><a href="./edit_type.php?type_id=<?php echo $type_id;?>">แก้ไข</a>
                  | <a href="./delete_type.php?type_id=<?php echo $type_id;?>"onclick="return confirm('ยืนยันการลบข้อมูล')">ลบ</a></center></td>
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
