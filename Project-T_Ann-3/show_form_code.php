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
           <h4 class="text-left text pt-2">จัดการข้อมูลโค๊ตส่วนลด</h4>
           <hr /> <!--เส้นขึ้นระหว่างข้อความ-->

           <a href="./add_code.php">
             <button class="w3-button w3-section w3-blue w3-ripple" input type="submit">เพิ่มข้อมูลโค๊ตส่วนลด +</button>
           </a>
           <br>
            <table class="table table-bordered table-striped table-hover"><!--เริ่ม-->
              <thead>
                <tr><!--หัวข้อตาราง-->
                  <th class="bg-success text-center">ลำดับ</th>
                  <th class="bg-success text-center">รหัสโค๊ต</th>
                  <th class="bg-success text-center">ราคาที่ลด</th>
                  <th class="bg-success text-center">วันที่หมดอายุ</th>
                  <th class="bg-success text-center">เวลาที่หมดอายุ</th>
                  <th class="bg-success text-center">การจัดการ</th>
                </tr>
              </thead>
                 <tbody>
              <?php
                $sql = "select * from  discountcode";//เลือกตารางที่จะโชว์ข้อมูล
                $result = $mysqli->query($sql) or die ($mysqli->error._LINE_);
                $i=0;
                while ($row = mysqli_fetch_array($result)) {
                  $code_id = $row["code_id"];
                  $code_name = $row["code_name"];
                  $code_discount = $row["code_discount"];
                  $code_exdate = $row["code_exdate"];
                  $code_extime = $row["code_extime"];
                  $u_id  = $row["u_id "];
                  $date =$code_exdate;
                  $newdate= date("d-m-Y" , strtotime($date));
                  $time =$code_extime;
                  $newtime= date("H:i" , strtotime($time));
                  $i=$i+1;

               ?>
               <tr>
                 <td><center><?php echo $i;?></center></td>
                 <td><center><?php echo $code_name;?></center></td>
                 <td><center><?php echo $code_discount;?></center></td>
                 <td align="right"><center><?php echo $newdate;?></center></td>
                 <td align="right"><center><?php echo $newtime;?></center></td>
                 <td><center><a href="./edit_code.php?code_id=<?php echo $code_id;?>">แก้ไข</a>
                  | <a href="./delete_code.php?code_id=<?php echo $code_id;?>"onclick="return confirm('ยืนยันการลบข้อมูล')">ลบ</a></center></td>
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
