<?php
require_once '../connection.php'; // เชื่อมต่อฐานข้อมูล
require_once '../vendor/autoload.php'; // เรียกใช้งานไลบรารี PHPSpreadsheet

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// ดึงข้อมูลจากฐานข้อมูล
$stmt = $conn->prepare("SELECT * FROM edonat");
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// สร้าง Spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// เขียนหัวข้อคอลัมน์
$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'Image Name');
$sheet->setCellValue('C1', 'Full Name');
$sheet->setCellValue('D1', 'ID Name');
$sheet->setCellValue('E1', 'Phone');
$sheet->setCellValue('F1', 'Address');
$sheet->setCellValue('G1', 'EDO');
$sheet->setCellValue('H1', 'Options EDO');
$sheet->setCellValue('I1', 'Amount');
$sheet->setCellValue('J1', 'Note');
$sheet->setCellValue('K1', 'Image File');
$sheet->setCellValue('L1', 'Upload Date');

// เขียนข้อมูลแต่ละแถว
$rowIndex = 2;
foreach ($rows as $row) {
    $sheet->setCellValue('A' . $rowIndex, $row['id']);
    $sheet->setCellValue('B' . $rowIndex, $row['img_name']);
    $sheet->setCellValue('C' . $rowIndex, $row['fullname']);
    $sheet->setCellValue('D' . $rowIndex, $row['idname']);
    $sheet->setCellValue('E' . $rowIndex, $row['phone']);
    $sheet->setCellValue('F' . $rowIndex, $row['address']);
    $sheet->setCellValue('G' . $rowIndex, $row['edo']);
    $sheet->setCellValue('H' . $rowIndex, $row['optionsedo']);
    $sheet->setCellValue('I' . $rowIndex, $row['amount']);
    $sheet->setCellValue('J' . $rowIndex, $row['note']);
    $sheet->setCellValue('K' . $rowIndex, $row['img_file']);
    $sheet->setCellValue('L' . $rowIndex, $row['upload_date']);
    $rowIndex++;
}

// กำหนด Header สำหรับการดาวน์โหลดไฟล์ Excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="edonat_report.xlsx"');
header('Cache-Control: max-age=0');

// สร้าง Writer และส่งออกไฟล์ Excel ไปยัง output stream
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

// ปิดการเชื่อมต่อฐานข้อมูล
$conn = null;
?>
