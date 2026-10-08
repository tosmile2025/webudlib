<?php
// ต้องมีไฟล์ xlsxwriter.class.php อยู่ในไดเรกทอรีเดียวกัน หรือมีการ require/include ที่ถูกต้อง
// require_once('xlsxwriter.class.php'); 

// 1. ข้อมูลอาร์เรย์ที่คุณให้มา
$data_arrays = array(
    array(
        'id_st' => 1,
        'tb_shop_id_sp' => 1,
        'barcode' => '100001',
        'product' => 'ยา1',
        'amount' => 100.00,
        'importpri' => 1500.00,
        'sellpri' => 1200.50,
        'date_st' => '2025-09-27 09:51:16'
    ),
    array(
        'id_st' => 2,
        'tb_shop_id_sp' => 2,
        'barcode' => '100002',
        'product' => 'ยา2',
        'amount' => 1000.00,
        'importpri' => 1200.00,
        'sellpri' => 1500.35,
        'date_st' => '2025-09-26 09:16:00'
    ),
    array(
        'id_st' => 3,
        'tb_shop_id_sp' => 3,
        'barcode' => '100003',
        'product' => 'ยา3',
        'amount' => 5000.00,
        'importpri' => 5200.00,
        'sellpri' => 1000000.00,
        'date_st' => '2025-09-18 10:47:04'
    ),
    array(
        'id_st' => 4,
        'tb_shop_id_sp' => 4,
        'barcode' => '100004',
        'product' => 'ยา4',
        'amount' => 1000.00,
        'importpri' => 1300.00,
        'sellpri' => 1100.00,
        'date_st' => '2025-09-18 10:47:12'
    )
);

// 2. กำหนดชื่อไฟล์และชื่อชีท
$filename = "report_products_" . date('Ymd_His') . ".xlsx";
$sheet_name = 'ProductData';

// 3. กำหนดหัวตารางและรูปแบบข้อมูล (ตามคอลัมน์ที่ต้องการ)
// รูปแบบ: 'ชื่อคอลัมน์ใน Excel' => 'ประเภทข้อมูล'
$header = array(
    'barcode' => 'string',
    'product' => 'string',
    'sellpri' => 'price' // กำหนดเป็น price เพื่อให้แสดงเป็นรูปแบบตัวเลขสกุลเงิน/ทศนิยม
);

// 4. เตรียมข้อมูลสำหรับตาราง Excel
$data_for_export = array();

// เพิ่มหัวตารางลงในข้อมูลชุดแรก
$header_row = array_keys($header); // ดึงเฉพาะชื่อคอลัมน์มาเป็นแถวแรก (barcode, product, sellpri)
$data_for_export[] = $header_row;

// วนลูปเพื่อดึงข้อมูลตามคอลัมน์ที่กำหนดเท่านั้น
foreach ($data_arrays as $item) {
    $row = array(
        $item['barcode'],
        $item['product'],
        $item['sellpri'] // ดึงเฉพาะคอลัมน์ที่ต้องการ
    );
    $data_for_export[] = $row;
}

// 5. สร้างไฟล์ Excel โดยใช้ XLSXWriter

// ต้องตรวจสอบว่าคลาส XLSXWriter ถูกโหลดแล้ว
if (!class_exists('XLSXWriter')) {
    die("XLSXWriter class not found. Please make sure 'xlsxwriter.class.php' is included or Composer autoload is working.");
}

$writer = new XLSXWriter();
$writer->setAuthor('Your Name/System'); // กำหนดผู้สร้างไฟล์ (ทางเลือก)

// กำหนดหัวตาราง (แยกต่างหากเพื่อให้กำหนด format ได้)
$styles1 = array( 'font' => 'Arial', 'font-size' => 10, 'font-style' => 'bold', 'fill' => '#eee', 'halign' => 'center' );
$writer->writeSheetHeader($sheet_name, $header, $styles1);

// เขียนข้อมูลแถวต่อแถว (เริ่มจากแถวที่ 2 เพราะแถวแรกเป็น header ไปแล้ว)
// ใช้ $data_for_export โดยข้ามแถวแรกที่เป็น header ที่เพิ่มเข้าไปแล้ว
for ($i = 1; $i < count($data_for_export); $i++) {
    $writer->writeSheetRow($sheet_name, $data_for_export[$i]);
}

// 6. ตั้งค่าให้ดาวน์โหลดไฟล์
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

// ส่งไฟล์ออกไปยังเบราว์เซอร์
$writer->writeToStdOut();
exit(0);

// หากต้องการบันทึกไฟล์บนเซิร์ฟเวอร์แทนการดาวน์โหลด:
// $writer->writeToFile($filename); 
// echo "File created: " . $filename;
?>