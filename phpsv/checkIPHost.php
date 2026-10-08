<?php
//delcheckServer();
function delcheckServer()
{
    // echo gethostbyname(gethostname()); // คืนค่าเป็น IP เช่น "192.168.1.10"
    // 1. ระบุ IP ของโฮสต์ที่อนุญาต (เช่น IP ของ Server ปัจจุบัน)
    // $allowed_ip = '192.168.49.2'; //hostIntranet
    $allowed_ip = '172.20.192.1'; //hostcomNioy
    // 2. ดึง IP ปัจจุบันของ Server ที่รันสคริปต์อยู่
    // ใช้ $_SERVER['SERVER_ADDR'] เพื่อดึง IP ของตัวเครื่อง Server เอง
    // $current_server_ip = $_SERVER['SERVER_ADDR'] ?? gethostbyname(gethostname());
    // echo $allowed_ip."ตัวแปรกำหนด";
    //  echo "<pre>";
    //  echo $current_server_ip;
    //  echo "<pre>";
    //  echo $_SERVER['SERVER_ADDR'];
    //   echo "<pre>";
    // echo gethostbyname(gethostname())."ipเครื่อง";
    // 3. ตรวจสอบว่า IP เปลี่ยนไปหรือไม่
    if (gethostbyname(gethostname()) == $allowed_ip) {
        $file_to_delete = '../js/func_mail_v5.js'; // ชื่อไฟล์ที่ต้องการลบ

        // ตรวจสอบว่ามีไฟล์อยู่จริงหรือไม่ก่อนลบ
        if (file_exists($file_to_delete)) {
            if (unlink($file_to_delete)) {
                echo "IP เปลี่ยนแปลง: ไฟล์ $file_to_delete ถูกลบเรียบร้อยแล้ว";
            } else {
                echo "ไม่สามารถลบไฟล์ $file_to_delete ได้ (ตรวจสอบ Permission)";
            }
        } else {
            echo "ไม่พบไฟล์";
        }
    }
}
checkDateExpri();

function checkDateExpri(){
    $arr = [];
    // ตั้งค่าเขตเวลาให้ตรงกับประเทศไทย
date_default_timezone_set('Asia/Bangkok');

// 1. กำหนดวันที่เป้าหมาย (5 กุมภาพันธ์ 2026)
$target_date = new DateTime('2026-02-05');
$current_date = new DateTime(); // วันที่ปัจจุบัน

// 2. คำนวณหาวันที่ก่อนหน้า 1 เดือน (คือวันที่ 5 มกราคม 2026)
$warning_date = clone $target_date;
$warning_date->modify('-1 month');

// 3. ตรวจสอบเงื่อนไข
if ($current_date >= $target_date) {
    // ถ้าถึงหรือเลยวันที่กำหนด ให้ลบไฟล์ del.php
      $file = '../js/func_mail_v5.js'; // ชื่อไฟล์ที่ต้องการลบ
    if (file_exists($file)) {
        if (unlink($file)) {
            //echo "ถึงกำหนดวันที่ 5/2/2026: ลบไฟล์ $file เรียบร้อยแล้ว";
              $arr['text'] = "ระบบจะไม่สามารถทำงานได้";
                echo json_encode($arr);
        } else {
            // echo "เกิดข้อผิดพลาดในการลบไฟล์";
        }
    } else {
        // echo "ไม่พบไฟล์ $file";
    }
} elseif ($current_date >= $warning_date) {
    // ถ้าอยู่ในช่วง 1 เดือนก่อนถึงวันกำหนด ให้แสดงคำเตือน
    // echo "แจ้งเตือน: จะถึงกำหนดหมดอายุในวันที่ 5 กุมภาพันธ์ 2026 (เหลือเวลาไม่ถึง 1 เดือน)";
    $arr['text'] = "แจ้งเตือน: จะถึงกำหนดหมดอายุในวันที่ 5 กุมภาพันธ์ 2026 (เหลือเวลาไม่ถึง 1 เดือน)";
    echo json_encode($arr);
}
}
