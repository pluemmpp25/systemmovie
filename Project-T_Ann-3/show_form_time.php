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
           <h4 class="text-left text pt-2">จัดการข้อมูลรอบฉายภาพยนตร์</h4>
           <hr /> <!--เส้นขึ้นระหว่างข้อความ-->

           <a href="./add_time.php">
             <button class="w3-button w3-section w3-blue w3-ripple" input type="submit">เพิ่มข้อมูลรอบฉายภาพยนตร์ +</button>
           </a>
           <br>
            <table class="table table-bordered table-striped table-hover"><!--เริ่ม-->
              <thead>
                <tr><!--หัวข้อตาราง-->
                  <th class="bg-success text-center">ลำดับ</th>
                  <th class="bg-success text-center">โรงฉาย</th>
                  <th class="bg-success text-center">ชื่อภาพยนตร์</th>
                  <th class="bg-success text-center">วันที่ฉาย</th>
                  <th class="bg-success text-center">เวลาที่ฉาย</th>
                  <th class="bg-success text-center">ราคาแถวหน้า</th>
                  <th class="bg-success text-center">ราคาแถวหลัง</th>
                  <th class="bg-success text-center">การจัดการ</th>
                </tr>
              </thead>
                 <tbody>
              <?php
                $sql = "select * from  movietime";//เลือกตารางที่จะโชว์ข้อมูล
                $result = $mysqli->query($sql) or die ($mysqli->error._LINE_);
                $i=0;
                while ($row = mysqli_fetch_array($result)) {
                  $time_id = $row["time_id"];
                  $time_playdate = $row["time_playdate"];
                  $time_playtime = $row["time_playtime"];
                  $time_price = $row["time_price"];
                  $time_pricen = $row["time_pricen"];
                  $t_id = $row["t_id"];
                  $name_id = $row["name_id"];

                  $date =$time_playdate;
                  $newdate= date("d-m-Y" , strtotime($date));

                  $time =$time_playtime;
                  $newtime= date("H:i" , strtotime($time));

                  $i=$i+1;

                  $sql2 = "select * from  movietheater where t_id = '$t_id'";//เลือกตารางที่จะโชว์ข้อมูล
                  $result2 = $mysqli->query($sql2) or die ($mysqli->error._LINE_);
                  while ($row2 = mysqli_fetch_array($result2)) {
                    $t_id = $row2["t_id"];
                    $t_name = $row2["t_name"];
                    $u_id = $row2["u_id"];
                    $st_id = $row2["st_id"];


                  $sql4 = "select * from  moviename where name_id = '$name_id' ";//เลือกตารางที่จะโชว์ข้อมูล
                  $result4 = $mysqli->query($sql4) or die ($mysqli->error._LINE_);
                  while ($row4 = mysqli_fetch_array($result4)) {
                    $name_id = $row4["name_id"];
                    $name_th = $row4["name_th"];
                    $name_en = $row4["name_en"];
                    $name_time = $row4["name_time"];
                    $name_details = $row4["name_details"];
                    $type_id = $row4["type_id"];
                  }
                }

               ?>
               <tr>
                 <td><center><?php echo $i;?></center></td>
                 <td><center><?php echo $t_name;?></center></td>
                 <td><center><?php echo $name_th;?></center></td>
                 <td align="right"><center><?php echo $newdate;?></center></td>
                 <td align="right"><center><?php echo $newtime;?></center></td>
                 <td><center><?php echo $time_price;?></center></td>
                 <td><center><?php echo $time_pricen;?></center></td>
                 <td><center><a href="./edit_time.php?time_id=<?php echo $time_id;?>">แก้ไข</a>
                  | <a href="./delete_time.php?time_id=<?php echo $time_id;?>"onclick="return confirm('ยืนยันการลบข้อมูล')">ลบ</a></center></td>
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
