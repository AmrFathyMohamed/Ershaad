<?php
require('tcpdf/tcpdf.php'); // Include TCPDF library

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');
$pdf->SetCreator('Your Name');
$pdf->SetTitle('Admin Data PDF');
$pdf->SetHeaderData('', '', 'Admin Data PDF', '', '');
$pdf->setHeaderFont(array('helvetica', '', 12));
$pdf->setFooterFont(array('helvetica', '', 10));
$pdf->SetDefaultMonospacedFont('helvetica');
$pdf->SetMargins(10, 10, 10);
$pdf->SetAutoPageBreak(TRUE, 10);
$pdf->SetFont('helvetica', '', 12);

$pdf->AddPage();

$html = '<h1>Admin Data</h1>';
$html .= '<table border="1">';
$html .= '<tr><th>Name</th><th>Username</th><th>Email</th><th>Password</th></tr>';
foreach ($AdminsData as $Admin) {
    $html .= '<tr>';
    $html .= '<td>' . $Admin['FullName'] . '</td>';
    $html .= '<td>' . $Admin['Username'] . '</td>';
    $html .= '<td>' . $Admin['Email'] . '</td>';
    $html .= '<td>' . $Admin['Password'] . '</td>';
    $html .= '</tr>';
}
$html .= '</table>';

$pdf->writeHTML($html, true, false, true, false, '');

// Set headers for download
$pdf->Output('admin_data.pdf', 'D');
?>