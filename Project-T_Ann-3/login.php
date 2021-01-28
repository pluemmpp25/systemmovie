<!DOCTYPE html>
<html>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="http://www.w3schools.com/w3css/4/w3.css" />
<body>

  <!--Sidebar -->
  <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%"><!--ส่วนของแถบเมนู-->
    <h3 class="w3-bar-item w3-center">เมนูหลัก</h3>
    <a href="./login.php" class="w3-bar-item w3-button">เข้าสู่ระบบ</a>
    <a href="./register.php" class="w3-bar-item w3-button">สมัครสมาชิก</a>
  </div>

  <style>
  .error{color: #FF0000;}
  </style>
  <style>
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 39px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
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

  <!-- content -->
  <div style="margin-left:25%"><!--ขนาดของหัวข้อ-->
    <div class="w3-container w3-purple w3-center" style="padding: 2em 16px;"> <!--สีของหัวข้อ-->
      <h1>ระบบจองตั๋วภาพยนต์ออนไลน์</h1>
    </div>
    <div class="w3-container">
      <center><h2>กรอกชื่อผู้ใช้งานเพื่อเข้าสู่ระบบ</h2></center>

    <form action="./checklogin.php" method="post" name="frm">
      <?php
      if(!isset($error)){ // ถ้าไม่มี error ให้เป็นค่าว่าง
        $error="";
      }else{
        $error=$_GET['error']; // ถ้ามี error ไม่เอา error ไปแสดงแบบ get (ต่อท้าย url)
      }
       ?>
      <form action="./firstpage.php">
         <center><table border="0" style="width: 400px">
           <tbody>

             <tr>
               <td>
                 ชื่อผู้ใช้งาน :
               </td>
               <td>
                 <input type="text" name="username" oninvalid="InvalidMsg(this);" required=" " /><span class="error" style="color:red" >*
               </td>
             </tr>

             <tr>
               <td>
                 รหัสผ่าน :
               </td>
               <td>
                 <input type="password" name="password" oninvalid="InvalidMsg(this);" required=" " /><span class="error" style="color:red" >*
               </td>
             </tr>


           </tbody>
         </table><br />
         <!-- <input type="submit" class="button" value="เข้าสู่ระบบ"> -->
         <button type="submit" class="w3-button w3-section w3-green w3-ripple" >เข้าสู่ระบบ</button>
         <button input type="button" class="w3-button w3-section w3-red w3-ripple" onclick="window.location.href='login.php'">ย้อนกลับ</button>
       </div>
       </form>
    </form>
  </div>
  </body>
  </html>
