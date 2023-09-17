<?php
include('PHPExcel/PHPExcel.php'); // Include PHPExcel library

// Create a new PHPExcel object
$objPHPExcel = new PHPExcel();

// Create a new worksheet
$objPHPExcel->setActiveSheetIndex(0);
$sheet = $objPHPExcel->getActiveSheet();

// Add your data to the worksheet
$sheet->setCellValue('A1', 'Name');
$sheet->setCellValue('B1', 'Username');
$sheet->setCellValue('C1', 'Email');
$sheet->setCellValue('D1', 'Password');

$row = 2;
foreach ($AdminsData as $Admin) {
    $sheet->setCellValue('A' . $row, $Admin['FullName']);
    $sheet->setCellValue('B' . $row, $Admin['Username']);
    $sheet->setCellValue('C' . $row, $Admin['Email']);
    $sheet->setCellValue('D' . $row, $Admin['Password']);
    $row++;
}

// Set headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="admin_data.csv"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
$objWriter->save('php://output');
exit;
?>