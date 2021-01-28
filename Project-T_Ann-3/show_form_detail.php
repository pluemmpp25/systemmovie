<?php
session_start();
include("./connectDatabase.php");
include("./menu.php");
include("./head.php");
 ?>

 <!--content-->
 <div style="margin-left:25%"><!--ขนาดของหัวข้อ-->
   <div class="w3-container w3-purple w3-center" style="padding: 2em 16px;"> <!--สีของหัวข้อ-->
     <h1>ระบบจองตั๋วภาพยนต์ออนไลน์</h1>
   </div>

   <div class="w3-container">
     <div class="w3-container" style="padding: 32px">
       <div class="row justify-content-center"><!--จัดตำแหน่งของตาราง-->
         <div class="col-lg-12 bg-light rounded my-2 py-2"> <!--พื้นหลังของตาราง-->
           <h4 class="text-left text pt-2">จัดการข้อมูลภาพยนตร์</h4>
           <hr /> <!--เส้นขึ้นระหว่างข้อความ-->

           <!-- <a href="./add_name.php">
             <button class="w3-button w3-section w3-blue w3-ripple" input type="submit">เพิ่มข้อมูลภาพยนตร์ +</button>
           </a> -->
           <br>
            <table class="table table-bordered table-striped table-hover"><!--เริ่ม-->
              <thead>
                <tr><!--หัวข้อตาราง-->
                  <th class="bg-success text-center">ลำดับ</th>
                  <th class="bg-success text-center">ชื่อผู้ใช้</th>
                  <th class="bg-success text-center">ประเภทภาพยนตร์</th>
                  <th class="bg-success text-center">ชื่อภาพยนตร์</th>
                  <th class="bg-success text-center">โรงฉาย</th>
                  <th class="bg-success text-center">วันที่ฉาย</th>
                  <th class="bg-success text-center">โค้ตส่วนลด</th>                
                </tr>
              </thead>
                 <tbody>
              <?php
                // $sql = "select * from  moviename";//เลือกตารางที่จะโชว์ข้อมูล
                // $result = $mysqli->query($sql) or die ($mysqli->error._LINE_);
                // $i=0;
                // while ($row = mysqli_fetch_array($result)) {
                //   $name_id = $row["name_id"];
                //   $name_th = $row["name_th"];
                //   $name_en = $row["name_en"];
                //   $name_time = $row["name_time"];
                //   $name_details = $row["name_details"];
                //   $type_id = $row["type_id"];
                //   $i=$i+1;
                //
                //   $sql2 = "select * from  movietype where type_id = '$type_id'";//เลือกตารางที่จะโชว์ข้อมูล
                //   $result2 = $mysqli->query($sql2) or die ($mysqli->error._LINE_);
                //   while ($row2 = mysqli_fetch_array($result2)) {
                //     $type_id = $row2["type_id"];
                //     $type_th = $row2["type_th"];
                //     $type_en = $row2["type_en"];
                //
                //   }

               ?>
               <!-- <tr>
                 <td><center></center></td>
                 <td><center></center></td>
                 <td><center></center></td>
                 <td><center></center></td>
                 <td><center></center></td>
                 <td><center></center></td>
                 <td><center></center></td>
                 <td><center><center/></td>
               </tr> -->
               <?php
              //}

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
