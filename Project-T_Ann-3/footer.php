<script type="text/javascript"> // เขียน script เพื่อสร้างการค้นหา การโชว์ตารางข้อมูล
  $(document).ready(function(){
    $('table').dataTable({
      ordering:true, // ซ่อน filter
      paging : true,
      language: {
          searchPlaceholder: "รายการ....", //เปลี่ยนชื่อใน textbox search เป็น รายการ....
          sSearch: '<i class="fa fa-search"></i>',// icon ข้างๆ textbox search
          sZeroRecords: "ไม่มีรายการที่ต้องการค้นหา....", // เปลี่ยนชื่อตรงถ้าเกิดค้นหาแล้วไม่เจอรายการค้นหา
          sInfo: "แสดง _START_ ถึง _END_ รายการ จาก _TOTAL_ รายการ", // แสดง 1 ถึง 10 รายการ จาก 11 รายการ
         sInfoEmpty: "แสดง 0 ถึง 0 รายการ จาก _TOTAL_ รายการ",// ข้อความข้างล่างตอนที่ค้นหาไม่เจอข้อมูล
         sInfoFiltered:"(กรองข้อมูลจาก _MAX_ รายการ)",// ข้อความข้างล่างตอนที่ค้นหาไม่เจอข้อมูล
         lengthMenu: 'แสดง <select>'+ //แสดงจำนวนตาราง
                        '<option value="5">5</option>'+ //แสดง5แถว
                        '<option value="10">10</option>'+//แสดง10แถว
                        '<option value="15">15</option>'+//แสดง15แถว
                        '<option value="20">20</option>'+//แสดง20แถว
                        '<option value="-1">ทั้งหมด</option>'+//แสดงแถวทั้งหมด
                        '</select> รายการ',
                        paginate: {
                              previous: "ก่อนหน้า",
                              next: "หน้าถัดไป"
                            }
                      }
    });
  });

</script>
