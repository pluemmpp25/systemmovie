<?php


   require('ConnectDatabase.php');

//เลือกตารางที่จะโชว์ข้อมูล โดยให้แสดงเฉพาะกลุ่มของ id นั้น
   $sql = "SELECT * FROM major
         WHERE faculty_id LIKE '%".$_GET['id']."%'";


   $result = $mysqli->query($sql);


   $json = [];
   while($row = $result->fetch_assoc()){
        $json[$row['major_id']] = $row['major_name'];
   }
   //echo '<pre>'; print_r($json); exit();

   echo json_encode($json);

?>
