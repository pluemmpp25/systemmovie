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
           <h4 class="text-left text pt-2">จัดการข้อมูลโรงฉายภาพยนตร์</h4>
           <hr /> <!--เส้นขึ้นระหว่างข้อความ-->

           <a href="./add_theater.php">
             <button class="w3-button w3-section w3-blue w3-ripple" input type="submit">เพิ่มข้อมูลโรงฉายภาพยนตร์ +</button>
           </a>
           <br>
            <table class="table table-bordered table-striped table-hover"><!--เริ่ม-->
              <thead>
                <tr><!--หัวข้อตาราง-->
                  <th class="bg-success text-center">ลำดับ</th>
                  <th class="bg-success text-center">ชื่อโรงฉาย</th>
                  <th class="bg-success text-center">สถานะโรงฉาย</th>
                  <th class="bg-success text-center">การจัดการ</th>
                </tr>
              </thead>
                 <tbody>
              <?php
                $sql = "select * from  movietheater";//เลือกตารางที่จะโชว์ข้อมูล
                $result = $mysqli->query($sql) or die ($mysqli->error._LINE_);
                $i=0;
                while ($row = mysqli_fetch_array($result)) {
                  $t_id = $row["t_id"];
                  $t_name = $row["t_name"];
                  $u_id = $row["u_id"];
                  $st_id = $row["st_id"];
                  $i=$i+1;

                  $sql2 = "select * from  theater_status where st_id = '$st_id'";//เลือกตารางที่จะโชว์ข้อมูล
                  $result2 = $mysqli->query($sql2) or die ($mysqli->error._LINE_);
                  while ($row2 = mysqli_fetch_array($result2)) {
                    $st_id = $row2["st_id"];
                    $st_name = $row2["st_name"];


                  }

               ?>
               <tr>
                 <td><center><?php echo $i;?></center></td>
                 <td><center><?php echo $t_name;?></center></td>
                 <td><center><?php echo $st_name;?></center></td>
                 <td><center><a href="./edit_theater.php?t_id=<?php echo $t_id;?>">แก้ไข</a>
                  | <a href="./delete_theater.php?t_id=<?php echo $t_id;?>"onclick="return confirm('ยืนยันการลบข้อมูล')">ลบ</a></center></td>
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
