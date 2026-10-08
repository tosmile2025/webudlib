<?php
include('../connectdata/cnectDB.php');
include_once("xlsxwriter.class.php");
// $_POST['data'] = "dd";
if ($_POST['data']) {
    $num = $_POST['data'];
    // echo $connect;
    $writer = new XLSXWriter();
    $writer->setAuthor('As.Chon.ps');
    if ($connect->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $mysqli = 'select * from checkoutbook ';
    $query = $connect->prepare($mysqli);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        foreach ($result as $res) {
            // echo $res->barcode[0]."<br>";
            if ($res->barcode[0] == $num) {
                $arr[] = $res;
              
            }
             
        }
        // echo "<pre>";
        // print_r($json);
         // 2. กำหนดชื่อไฟล์และชื่อชีท
        $filename = "report_products_" . date('Ymd_His') . ".xlsx";
      

        // 2. กำหนด Header และ Format ของ Sheet
        $header = array(
            'บาร์โค้ด' => 'string',       // คอลัมน์ 1: barcode
            'รายชื่อหนังสือ' => 'string',  // คอลัมน์ 2: ข้อความสำหรับ Barcode
            'หมวดหมู่' => 'string', 
            'ปี/พ.ศ.' => 'string',       // คอลัมน์ 3: product
            'expri' => 'string',        // คอลัมน์ 4: sellpri (กำหนดเป็นรูปแบบ 'price' เพื่อแสดงผลเป็นสกุลเงิน/ตัวเลข)
        );

        // 3. กำหนด Style สำหรับคอลัมน์ Barcode
        // กำหนด Font 'Free 3 of 9' สำหรับคอลัมน์ที่ 2
        // (***หมายเหตุ: ผู้ใช้งานต้องติดตั้ง Font 'Free 3 of 9' ในเครื่องของตัวเองด้วย จึงจะเห็น Barcode ได้ถูกต้อง***)
        $styles = array(
            'barcode_font' => array(
                'font' => 'TH Sarabun New', // ชื่อ Font สำหรับ Barcode
                'font-size' => 16,        // ขนาด Font
                'widths' => [10, 20, 30,20,10], // กำหนดความกว้างคอลัมน์คร่าวๆ (เป็น optional)
            ),
        );

        // 4. สร้าง instance ของ XLSXWriter
        $writer = new XLSXWriter();
        $sheet_name = 'รายการคัดหนังสือออกจากระบบ';
        $writer->setAuthor('As.chon.ps');
        // 5. เขียน Header ของตารางลงใน Sheet
        $writer->writeSheetHeader($sheet_name, $header, $col_options = ['widths' => $styles['barcode_font']['widths']]);

        // 6. เตรียมข้อมูลสำหรับเขียนลงในแต่ละแถว
        //   echo "<pre>";
        // print_r($arr);
        foreach ($arr as $row_data) {
            // เตรียมข้อมูลสำหรับแถว   
            $row_to_write = array(
                $row_data->barcode,                                // คอลัมน์ 1: barcode (ตัวเลข)                        
                 $row_data->namebook, 
                 $row_data->catbook,                               // คอลัมน์ 3: product
                 $row_data->year,
                 $row_data->dt                                // คอลัมน์ 4: sellpri
            );

            // กำหนด Style สำหรับแต่ละเซลล์ในแถว
            // ให้เซลล์ที่สอง (index 1) ใช้ style ของ Barcode
            $row_styles = array(
                'string',
                $styles['barcode_font'], // ใช้ Style ที่กำหนดสำหรับ Barcode
                'string',
                'price'
            );

            // เขียนแถวข้อมูลลงใน Sheet
            $writer->writeSheetRow($sheet_name, $row_to_write, $row_styles);
        }
         // กำหนด Header เพื่อให้เบราว์เซอร์ดาวน์โหลดไฟล์
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . urlencode($filename) . '"');
        header('Cache-Control: max-age=0');
        $path = '../excelfile/'.$filename;
        // $writer->writeToStdOut(); // ส่งไฟล์ออกทาง Output
        $writer->writeToFile($path); // หากต้องการบันทึกเป็นไฟล์ใน Server
        // exit(0);
        // echo $path;
        $arr["path"] =  '../excelfile/'.$filename;
        $jsonR[] =$arr;
        echo json_encode($jsonR);
    } else{
         $arr["status"] = false;
        $jsonR[] =$arr;
        echo json_encode($jsonR);
    }
}
