<?php 
	include('../connectdata/cnectDB.php');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function Search_Data($con){
    $mysqli = mysqli_query($con, 'select * from book_store_tb as d1
                                  inner join regis_books_tb as d2 
                                  on(d1.IDLIKBOOK = d2.IDLIKBOOK)
                                  where d2.CATBOOK like "%qz 267%" ');		

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // เขียนหัวตาราง
    $sheet->fromArray(['Barcode', 'Book Name', 'ISBN', 'Pages', 'Year', 'Price', 'Category', 'Author'], NULL, 'A1');

    $rowNum = 2;
    while($result = mysqli_fetch_array($mysqli)){
        $sheet->setCellValue('A' . $rowNum, $result['BARCODE']);
        $sheet->setCellValue('B' . $rowNum, $result['NAME_BOOK']);
        $sheet->setCellValue('C' . $rowNum, $result['ISBN']);
        $sheet->setCellValue('D' . $rowNum, $result['COUNTPAGE']);
        $sheet->setCellValue('E' . $rowNum, $result['Year_book']);
        $sheet->setCellValue('F' . $rowNum, $result['Price_book']);
        $sheet->setCellValue('G' . $rowNum, $result['CATBOOK']);
        $sheet->setCellValue('H' . $rowNum, $result['byauthor']);
        $rowNum++;
    }

    // ตั้งค่าเพื่อดาวน์โหลดดาวน์โหลดไฟล์
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="books_report.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
}

Search_Data($con);
	
?>




















































